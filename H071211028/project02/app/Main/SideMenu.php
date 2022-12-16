<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'dashboard-overview-1',
                'params' => [
                            'layout' => 'side-menu',
                            ]
            ],

            'makanan' => [
                'icon' => 'box',
                'title' => 'Makanan',
                'route_name' => 'makanan',
                'params' => [
                    'layout' => 'side-menu'
                ]
            ],

            'categories' => [
                'icon' => 'box',
                'title' => 'categories',
                'route_name' => 'categories',
                'params' => [
                    'layout' => 'side-menu'
                ]
            ],


            'pesanan' => [
                'icon' => 'shopping-bag',
                'route_name' => 'pesanan',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Pesanan'
            ],

            'point-of-sale' => [
                'icon' => 'credit-card',
                'route_name' => 'point-of-sale',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Point of Sale'
            ],


            'devider',
            'user' => [
            'icon' => 'users',
            'title' => 'User',
            'route_name' => 'index',
            'params' => [
                    'layout' => 'index'
                        ]
            ],

            'inbox' => [
                'icon' => 'inbox',
                'route_name' => 'inbox',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Inbox'
            ],

            'chat' => [
                'icon' => 'message-square',
                'route_name' => 'chat',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Chat'
            ],

            'post' => [
                'icon' => 'file-text',
                'route_name' => 'post',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Post'
            ],

            'calendar' => [
                'icon' => 'calendar',
                'route_name' => 'calendar',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Calendar'
            ],

        ];
    }
}
