<?php 
namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class LoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $args = null)
    {
        $session = \Config\Services::session();
        if (!isset($_SESSION['logged_in']))
        {
            $session->setFlashdata('error', 'Maaf, anda harus login dulu!');
            return redirect()->to('/login');
        }
        // Do something here
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}