#!/usr/bin/env python3
import re
import sys
from pathlib import Path

import yaml

PRODUCT_NS = {
    "applesilicon": "AppleSilicon",
    "baremetal": "BareMetal",
    "block": "BlockStorage",
    "container": "Container",
    "domain": "Domain",
    "edge_services": "EdgeServices",
    "file": "FileStorage",
    "flexibleip": "FlexibleIp",
    "function": "Function",
    "inference": "Inference",
    "instance": "Instance",
    "iot": "Iot",
    "ipam": "Ipam",
    "jobs": "Jobs",
    "k8s": "K8s",
    "key_manager": "KeyManager",
    "lb": "LoadBalancer",
    "marketplace": "Marketplace",
    "mnq": "Messaging",
    "mongodb": "MongoDb",
    "rdb": "Rdb",
    "redis": "Redis",
    "registry": "Registry",
    "secret_manager": "SecretManager",
    "serverless_sqldb": "ServerlessSql",
    "tem": "TransactionalEmail",
    "vpc": "Vpc",
    "vpcgw": "PublicGateway",
    "webhosting": "WebHosting",
    "autoscaling": "Autoscaling",
    "audit_trail": "AuditTrail",
    "cockpit": "Cockpit",
    "account": "Account",
    "billing": "Billing",
    "iam": "Iam",
}

KEY_RE = re.compile(r"^scaleway\.([a-z0-9_]+)\.(v[0-9a-z_]+)\.(.+)$")

RESERVED_CLASS_NAMES = {
    "Function", "Namespace", "Class", "Interface", "Trait", "List", "Array",
    "String", "Int", "Float", "Bool", "Object", "Callable", "Iterable",
    "Parent", "Static", "Self", "Null", "True", "False", "Default", "Switch",
    "Enum", "Match", "Readonly", "Print", "Echo", "Exit", "Never", "Void", "Mixed",
}


def pascal(value: str) -> str:
    return "".join(part[:1].upper() + part[1:] for part in re.split(r"[_.\-]", value) if part)


def camel(value: str) -> str:
    parts = re.split(r"[_\-]", value)
    head = parts[0]
    return head + "".join(p[:1].upper() + p[1:] for p in parts[1:] if p)


def php_prop(name: str, spec: dict) -> tuple[str, str]:
    prop = camel(name)
    if prop in {"raw"}:
        prop += "Value"
    if not re.match(r"^[a-zA-Z_]", prop):
        prop = "_" + prop
    ptype = spec.get("type")
    if ptype == "string":
        decl = f"public ?string ${prop} = null,"
        hydrate = f"isset($data['{name}']) && \\is_scalar($data['{name}']) ? (string) $data['{name}'] : null,"
    elif ptype == "integer":
        decl = f"public ?int ${prop} = null,"
        hydrate = f"isset($data['{name}']) && \\is_numeric($data['{name}']) ? (int) $data['{name}'] : null,"
    elif ptype == "number":
        decl = f"public ?float ${prop} = null,"
        hydrate = f"isset($data['{name}']) && \\is_numeric($data['{name}']) ? (float) $data['{name}'] : null,"
    elif ptype == "boolean":
        decl = f"public ?bool ${prop} = null,"
        hydrate = f"isset($data['{name}']) ? (bool) $data['{name}'] : null,"
    elif ptype == "array":
        decl = f"public array ${prop} = [],"
        hydrate = f"\\is_array($data['{name}'] ?? null) ? $data['{name}'] : [],"
    elif ptype == "object":
        decl = f"public ?array ${prop} = null,"
        hydrate = f"\\is_array($data['{name}'] ?? null) ? $data['{name}'] : null,"
    else:
        decl = f"public mixed ${prop} = null,"
        hydrate = f"$data['{name}'] ?? null,"
    return decl, hydrate


def render(namespace: str, class_name: str, props: dict) -> str:
    decls = []
    hydrates = []
    seen = set()
    for name, spec in props.items():
        if not isinstance(spec, dict):
            continue
        decl, hydrate = php_prop(name, spec)
        prop_name = decl.split("$")[1].split(" ")[0].rstrip(",")
        if prop_name in seen:
            continue
        seen.add(prop_name)
        decls.append("        " + decl)
        hydrates.append("            " + hydrate)
    decls.append("        public array $raw = [],")
    hydrates.append("            $data,")
    body = "\n".join(decls)
    hydration = "\n".join(hydrates)
    return f"""<?php

declare(strict_types=1);

namespace ChuckBartowski\\ScalewaySdk\\Model\\{namespace};

final readonly class {class_name}
{{
    public function __construct(
{body}
    ) {{
    }}

    public static function from(array $data): self
    {{
        return new self(
{hydration}
        );
    }}
}}
"""


def main() -> None:
    schema_dir = Path(sys.argv[1])
    out_dir = Path(sys.argv[2]) if len(sys.argv) > 2 else Path(__file__).resolve().parent.parent / "src" / "Model"
    generated: dict[tuple[str, str], str] = {}
    skipped = 0

    for schema_file in sorted(schema_dir.glob("*.yml")):
        try:
            spec = yaml.safe_load(schema_file.read_text())
        except yaml.YAMLError:
            continue
        schemas = (spec or {}).get("components", {}).get("schemas", {})
        for key, definition in schemas.items():
            match = KEY_RE.match(key)
            if not match or not isinstance(definition, dict):
                continue
            product, _version, rest = match.groups()
            if "Request" in rest or "Response" in rest:
                continue
            if definition.get("type") not in (None, "object"):
                continue
            props = definition.get("properties")
            if not props:
                continue
            namespace = PRODUCT_NS.get(product, pascal(product))
            class_name = pascal(rest.replace(".", " "))
            if class_name in RESERVED_CLASS_NAMES:
                class_name += "Model"
            if not re.match(r"^[A-Z][A-Za-z0-9]*$", class_name):
                skipped += 1
                continue
            if (namespace, class_name) in generated:
                continue
            generated[(namespace, class_name)] = render(namespace, class_name, props)

    for (namespace, class_name), code in generated.items():
        target = out_dir / namespace
        target.mkdir(parents=True, exist_ok=True)
        (target / f"{class_name}.php").write_text(code)

    print(f"generated={len(generated)} skipped={skipped} namespaces={len({ns for ns, _ in generated})}")


if __name__ == "__main__":
    main()
