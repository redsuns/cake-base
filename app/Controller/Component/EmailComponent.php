<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('Sanitize', 'Utility');

class EmailComponent extends Component
{
    protected $controller;
    protected $emailFormat;
    protected $siteName;

    public function startup(\Controller $controller)
    {
        parent::startup($controller);

        $this->emailFormat = 'html';
        $this->siteName = Configure::read('siteName');
    }


    /**
     *
     * @param array $user
     * @param string $area
     * @return boolean
     */
    public function sendUserRegisterEmail($user, $area = 'site')
    {
        $this->autoRender = false;
        $viewVars = array('user' => $user);

        $email = new CakeEmail();
        $email->addTo($user['User']['email'], $user['User']['name'] . ' ' . $user['User']['surname']);
        $email->from('noreply@' . Configure::read('URL.domain'), $this->siteName);
        $email->charset('urf8');
        $email->emailFormat($this->emailFormat);
        $email->subject('Registro no site');
        $email->template( $area . '_user_register', false);
        $email->viewVars($viewVars);

        return $email->send();
    }


    /**
     * @param array $contact
     * @return boolean
     */
    public function sendContactEmail( $contact )
    {
        $email = new CakeEmail();

        $email->addTo(Configure::read('siteEmail'));
        $email->from( Sanitize::stripAll($contact['Contact']['email']) );
        $email->charset('utf8');
        $email->emailFormat($this->emailFormat);
        $email->subject('Novo contato através do site');
        $email->template('contact');
        $email->viewVars(array('contact' => $contact));

        return $email->send();
    }

} 