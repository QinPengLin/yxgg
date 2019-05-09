<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'publicConfig'=>array(
        'column'=>array(
            //'首页'=>array('mark'=>'home','child'=>array()),
            '腾讯'=>array('mark'=>'qq','child'=>array(
                array('name'=>'刺激战场','mark'=>'qq_pg'),
                array('name'=>'王者荣耀','mark'=>'qq_pvp'),
                array('name'=>'和平精英','mark'=>'qq_gp')
            )),
            '网易'=>array('mark'=>'wy','child'=>array(
                array('name'=>'率土之滨','mark'=>'wy_stzb'),
            )),
//            '简介'=>array('mark'=>'jj','child'=>false,
//            ),

        ),
        'siteName'=>'公告集',
        'adminListPag'=>10,
        'adminQq'=>'1017962047',
    ),
];
