<?php
function isActive(string $path): string
{
    return str_contains(current_url(), base_url($path)) ? 'active' : '';
}
