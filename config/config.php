<?php

const DEFAULT_CONTROLLER = 'Home'; // default controller if there isn't one defined in the url
const DEBUG = true; // set to false when in production
const DEFAULT_LAYOUT = 'default'; // if no layout is set in the controller use this layout
const SITE_TITLE = 'MVC Framework'; // this will be used if no site title is set
const PROOT = '/eBusiness/'; // set the server root


// database details
const DB_HOST = '127.0.0.1';
const DB_NAME = 'ecom';
const DB_USER = 'root';
const DB_PASSWORD = '';

const CURRENT_USER_SESSION_NAME = 'fhHUHFnjnHHIEnjwwBjhdNnov'; // session name for logged in user
const REMEMBER_ME_COOKIE_NAME = 'e-commerce-user1'; // cookie name for logged in user remember me
const REMEMBER_ME_COOKIE_EXPIRY = 604800; // time in seconds for remember me cookie to live (30 days)
