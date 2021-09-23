<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */
use CodeIgniter\Controller;
use App\Models\Option\MenuModel;
use App\Models\Option\AppModel;

class BackendController extends Controller {

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    public $helpers    = ['Min', 'Api', 'Bootstrap', 'Format', 'inflector', 'form'];
    public $menu       = array();
    public $activeMenu = array();
    public $app        = array();
    public $db         = null;
    public $param      = array();

    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        session();
        $session = session();

        $model      = new MenuModel();
        $this->menu = $model->getMenu();


        $uri                       = service('uri');
        $uriController             = $uri->getSegment(2);
        $this->activeMenu          = $model->getPrefik($uriController);
        $this->param['activeMenu'] = $this->activeMenu;
        $this->param['menu']       =  $this->menu;

        //set site information
        $AppModel = new AppModel();
        $info = $AppModel->get();
        $app = [
            "nama"       => $info['nama'],
            "site"       => $info['site'],
            "versi"      => $info['versi'],
            "deskripsi"  => $info['deskripsi'],
            "logo"       => $info['logo'],
            "pengembang" => $info['pengembang'],
        ];
        $session->set($app);
    }


}
