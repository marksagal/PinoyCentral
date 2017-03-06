<?php
class Home extends CoreController
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->blade->view('home/index', [
            'css' => $this->css(['home/nav.css'], 'home/index'),
            'js' => $this->js(['ajax.js', 'home/login.js'], 'home/login'),
            'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_token' => $this->security->get_csrf_hash()
        ]);
    }
}
