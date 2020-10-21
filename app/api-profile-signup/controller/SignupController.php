<?php
/**
 * SignupController
 * @package api-profile-signup
 * @version 0.0.1
 */

namespace ApiProfileSignup\Controller;

use Profile\Model\Profile;
use LibForm\Library\Form;

class SignupController extends \Api\Controller
{
    public function registerAction(){
        if(!$this->app->isAuthorized())
            return $this->resp(401);

        $form = new Form('api.profile.signup');
        if(!($valid = $form->validate()))
            return $this->resp(422, $form->getErrors());

        $valid->password = password_hash($valid->password, PASSWORD_DEFAULT);

        $valid->educations = '[]';
        $valid->profession = '[]';
        $valid->contact    = '[]';
        $valid->socials    = '[]';

        if(!($id = Profile::create((array)$valid)))
            return $this->resp(500, Profile::lastError());

        $this->resp(0, 'success');
    }
}