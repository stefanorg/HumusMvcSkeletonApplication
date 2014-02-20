<?php

class Default_IndexController extends Dipvvf_Controller_Base
{

    public function indexAction()
    {
        //default parameter
        //$page = "turnario";
        if($this->_hasParam("page")){
          $page = $this->_getParam ("page");
          $this->_helper->viewRenderer("index/".$page, null, true);
        }else{
          $this->_forward('index', 'ods', 'ods');
        }
    }

    public function downloadAction(){

      $fileName = $this->getRequest()->getParam('file');
      $forceDownload = $this->getRequest()->getParam("force-download");

      $type = isset($forceDownload) ? 'attachment' : 'inline';

      $url = urldecode($fileName);
      $filePath = APPLICATION_DOWNLOAD_DIR;
      //. DIRECTORY_SEPARATOR .  trim(urldecode($fileName));
      if(substr($url, 0,1)!==DIRECTORY_SEPARATOR)
        $filePath .= DIRECTORY_SEPARATOR;

      $filePath .= trim($url);

      //se il file non esiste ...
      if(!file_exists($filePath)){
        $this->flashMessenger
                ->setNamespace('head')
                ->addMessage("Il contenuto richiesto non e' disponibile.");
        $this->_forward('index');

        //throw new Zend_Controller_Action_Exception('File not found', 404);
      }else{
      	    // disable layout and view
        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $name = self::getFilename($filePath);
        $mime = Utils_Mimetype::getType($name);
        
        //$this->getResponse()
        //        ->setHeader('Content-Type',$mime)
        //        ->setHeader('Content-Disposition',"$type;filename=".$name)
        //        ->setHeader('Content-length',  filesize($filePath));

        //readfile($filePath);

        //ZF2 stream response
        //$fileName = 'somefile';
        //var_dump($filePath);die();
        $response = new \Zend\Http\PhpEnvironment\Response();
        //$response->setStream(fopen($filePath, 'r'));
        $response->setStatusCode(200);

        $headers = new \Zend\Http\Headers();
        $headers->addHeaderLine('Content-Type', $mime)
                ->addHeaderLine('Content-Disposition', 'attachment; filename="' . $name . '"')
                ->addHeaderLine('Content-Length', filesize($filePath));

        #Bug fix download file over https from ie8
        #http://blogs.msdn.com/b/ieinternals/archive/2009/10/02/internet-explorer-cannot-download-over-https-when-no-cache.aspx
        $headers->addHeaderLine('Cache-Control', 'max-age=28800');
        $headers->addHeaderLine('Expires', gmdate('D, d M Y H:i:s T', strtotime('+8 hours')));
        header_remove("Pragma");
        ##End bug fix

        $response->setHeaders($headers);

        //var_dump($response->getHeaders());die();

        $response->setContent(file_get_contents($filePath));
        $response->send();
        //return $response;
        //$this->getResponse()->sendResponse();
      }
    }

    private static function getFilename($file_path)
    {
      $array = explode('/', $file_path);

      return array_pop($array);
    }
}

