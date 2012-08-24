<?php
sfProjectConfiguration::getActive()->loadHelpers('I18N');
include(dirname(__FILE__).'/../../bootstrap/functional.php');

 
$browser = new sfTestFunctional(new sfBrowser());

$browser 
    ->info('Case '.$snI.' : Display Login Page')
	->get('login/login')
	->with('request')
	->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'login')
	->end()
	->with('response')
	->begin()
	->isStatusCode(200)
	->end(); 
 
$snI++; 
$browser->info(''); 
$browser
    ->info('Case '.$snI.' : Now login with Null Username.')
	->setField('user[username]', '')
	->setField('user[password]', 'viren12')
	->click(__('btn_login'))
	->with('request')->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'login')
	->end()
	->with('response')
	->begin()
	->isStatusCode(200)
	->checkElement('li', __('msg_username_blank'))
	->end(); 
 
$snI++; 

$browser
    ->info('Case '.$snI.' : Now login with Null Password.')
	->setField('user[username]', 'viren')
	->setField('user[password]', '')
	->click(__('btn_login'))
	->with('request')->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'login')
	->end()
	->with('response')->begin()
	->isStatusCode(200)
	->checkElement('li', __('msg_password_blank'))
	->end(); 

$snI++; 

$browser
    ->info('Case '.$snI.' : Now login with false data.')
	->setField('user[username]', 'virfsen')
	->setField('user[password]', 'dasdsaas')
	->click(__('btn_login'))
	->with('request')
	->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'login')
	->end()
	->with('response')->begin()
	->isStatusCode(200)
	->checkElement('p[id="error"]', 'Username and password does not match')
	->end(); 
 
$snI++; 

$browser
    ->info('Case '.$snI.' : Now login with true credentials.')
	->setField('user[username]', 'viren')
	->setField('user[password]', 'viren12')
	->click(__('btn_login'))
	->with('request')->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'login')
	->end()
	->with('response')
	->begin()
	->isStatusCode(302)
	->end(); 
$browser->test()->diag(' End Test Case 5 login/login :   ...'); 
 
$browser 
    ->info('Case '.$snI.' : Display Registration Page')
    ->get('login/registration')
	->with('request')->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'registration')
	->end()
	->with('response')
	->begin()
	->isStatusCode(200)
	->end(); 
   
$snI++; 

$browser
    ->info('Case '.$snI.' : Now Register with blank Confirm password.')
	->setField('user[username]', 'virenDave')
	->setField('user[password]', 'viren12')
	->setField('user[confirmPassword]', '')
	->setField('user[image]', 'viren.jpg')
	->setField('user[email]', 'viren.virtueinfo@gmail.com')
	->setField('user[contact_no]', '9662669264')
	->click('Save')
	->with('request')->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'registration')
	->end()
	->with('response')->begin()
	->isStatusCode(200)
	->checkElement('li', 'Enter confirm Password')
	->end(); 

$snI++; 

$browser
    ->info('Case '.$snI.' : Now Register with blank image.')
	->setField('user[username]', 'virenDave')
	->setField('user[password]', 'viren12')
	->setField('user[confirmPassword]', 'viren')
	->setField('user[image]', '')
	->setField('user[email]', 'viren.virtueinfo@gmail.com')
	->setField('user[contact_no]', '9662669264')
	->click('Save')
	->with('request')
	->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'registration')
	->end()
	->with('response')->begin()
	->isStatusCode(200)
	->checkElement('li', __('msg_image_blank'))
	->end(); 

 
 
$snI++; 

$browser
    ->info('Case '.$snI.' : Now Register with blank email.')
	->setField('user[username]', 'virenDave')
	->setField('user[password]', 'viren12')
	->setField('user[confirmPassword]', 'viren')
	->setField('user[image]', sfConfig::get('sf_test_dir').'/image.jpg')
	->setField('user[email]', '')
	->setField('user[contact_no]', '9662669264')
	->click('Save')
	->with('request')->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'registration')
	->end()
	->with('response')
	->begin()
	->isStatusCode(200)
	->checkElement('li', __('msg_email_blank'))
	->end(); 

$snI++; 

$browser
    ->info('Case '.$snI.' : Now Register with blank Contact no.')
	->setField('user[username]', 'virenDave')
	->setField('user[password]', 'viren12')
	->setField('user[confirmPassword]', 'viren')
	->setField('user[image]', sfConfig::get('sf_test_dir').'/image.jpg')
	->setField('user[email]', 'viren.virtueinfo@gmail.com')
	->setField('user[contact_no]', '')
	->click('Save')
	->with('request')
	->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'registration')
	->end()
	->with('response')
	->begin()
	->isStatusCode(200)
	->checkElement('li', __('msg_contact_blank'))
	->end(); 
 
$snI++; 

$browser
    ->info('Case '.$snI.' : Now Register with true data')
	->click(
        'Save', 
	    array(
	        'user' => array(
                'username'         => 'virenDave',
                'password'         => 'viren12',
                'confirmPassword'  => 'viren12',
                'image'            => sfConfig::get('sf_test_dir').'/image.jpg',
                'email'            => 'viren.virtueinfo@gmail.com',
                'contact_no'       => '9662669264',
            )
	    )
    )
	->with('request')
	->begin()
	->isParameter('module', 'login')
	->isParameter('action', 'registration')
	->end()
	->with('response')
	->begin()
	->isStatusCode(302)
	->end(); 
	
