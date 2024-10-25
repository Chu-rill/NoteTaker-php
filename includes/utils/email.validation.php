<?php

function is_email_valid($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
}