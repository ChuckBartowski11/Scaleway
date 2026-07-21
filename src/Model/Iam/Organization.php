<?php

declare(strict_types=1);

namespace ChuckBartowski\ScalewaySdk\Model\Iam;

final readonly class Organization
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $alias = null,
        public ?bool $loginPasswordEnabled = null,
        public ?bool $loginMagicCodeEnabled = null,
        public ?bool $loginOauth2Enabled = null,
        public ?bool $loginSamlEnabled = null,
        public array $raw = [],
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            isset($data['id']) && \is_scalar($data['id']) ? (string) $data['id'] : null,
            isset($data['name']) && \is_scalar($data['name']) ? (string) $data['name'] : null,
            isset($data['alias']) && \is_scalar($data['alias']) ? (string) $data['alias'] : null,
            isset($data['login_password_enabled']) ? (bool) $data['login_password_enabled'] : null,
            isset($data['login_magic_code_enabled']) ? (bool) $data['login_magic_code_enabled'] : null,
            isset($data['login_oauth2_enabled']) ? (bool) $data['login_oauth2_enabled'] : null,
            isset($data['login_saml_enabled']) ? (bool) $data['login_saml_enabled'] : null,
            $data,
        );
    }
}
