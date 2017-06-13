<?php

namespace App\Controller;

use BuildIt\Controller\Controller;

/**
 * Class AppController
 * @package App\Controller
 */
abstract class AppController extends Controller
{
    protected $templatesPath = FOLDER_ROOT . '/app/Template';
    protected $viewsPath = FOLDER_ROOT . '/app/View';
}