<?php
App::uses('AppController', 'Controller');

/**
 * Criação de sitemap através da rotas registradas em Routes
 *
 * @author andrebian
 */
class SitemapController extends AppController
{
    protected $base;
    
    public function admin_index()
    {
        $this->base = Configure::read('URL.base');
        
        $routes = array();

        $routesFromRouter = Router::$routes;
        foreach ($routesFromRouter as $route) {

            if (strpos($route->template, ':') === false && strpos($route->template, 'admin') === false) {
                $routes[] = $route->template;
            }
        }

        if ($this->request->is('post')) {
            $this->parseSitemap($this->request->data['Node']);
            $this->redirect('/admin/pages/index/home');
        }

        $this->set(compact('routes'));
    }

    
    private function parseSitemap($request)
    {
        $lastModification = date('Y-m-d\TH:i:s+03:00', strtotime('-1day'));
        
        if (is_file('files/sitemap.xml') ) {
            unlink('files/sitemap.xml');
        }
        
        $content = '<?xml version="1.0" encoding="UTF-8"?>';
        $content .= '<!-- generated-on="'.date('d/m/Y H:i:s').'" -->';
        $content .= '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        foreach($request as $row) {

            $content .= '<url>
		<loc>'.$this->base.$row['url'].'</loc>
		<lastmod>'.$lastModification.'</lastmod>
		<changefreq>'.$row['frequency'].'</changefreq>
		<priority>'.$row['priority'].'</priority>
                </url>
                ';
        }
        $content .= '</urlset>';

        $resource = fopen('files/sitemap.xml', 'w+');
        if ( fwrite($resource, $content) ) {
            $this->Session->setFlash('<p>Sitemap gerado com sucesso</p>', 'default', array('class' => 'notification msgsuccess'));
        } else {
            $this->Session->setFlash('<p>Não foi possível gerar o sitemap, por favor tente novamente</p>', 'default', array('class' => 'notification msgerror'));
        }
        
        fclose($resource);
        
        return true;
    }
}
