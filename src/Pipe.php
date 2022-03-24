<?php

declare(strict_types=1);

namespace Phonyland\SequenceGenerator;

class Pipe
{
    private function __construct(public mixed $value)
    {
    }

    public static function new(mixed $value): self
    {
        return new self($value);
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function __invoke(callable $param): static
    {
        $this->value = $param($this->value);

        return $this;
    }
}
