<?php

namespace Hup234design\FilamentCms\Contracts;

interface ContentBlockTemplate
{
    public static function name(): string;

    public static function title(): string;

    public static function schema(): array;
}
