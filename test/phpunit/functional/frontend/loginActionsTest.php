<?php
    // First, place this in your functional bootstrap file
    // (optional, but helps keep things organized)
     
    sfConfig::set('FUNC_ADMIN_USER', 'viren');
    sfConfig::set('FUNC_ADMIN_PASS', 'viren12');
     
    // In the functional test, this line logs in a user using vars from the bootstrap file
    // It first logs in a user, then checks that the user has access to the page we are testing
     
    $browser->
     
    // go to login page
    get('/login')->
     
    // make sure we did not get access
    with('response')->begin()->
    isStatusCode(401)->
    end()->
     
    // log in
    with('form')->begin()->
    click('login', array(
    'signin' => array(
    'username' => sfConfig::get('FUNC_ADMIN_USER'),
    'password' => sfConfig::get('FUNC_ADMIN_PASS'))))->
    end()->
     
    // try again to access the appointment page (should have been block the first time
    get('/login')->
     
    // make sure we have access now
    with('response')->begin()->
    isStatusCode(200)->
    end()
    ;