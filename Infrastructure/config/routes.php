<?php

declare(strict_types=1);

use Infrastructure\Handler;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\MiddlewareFactory;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    $app->get('/', Handler\HomePageHandler::class, 'home');
    $app->get('/api/ping', Handler\PingHandler::class, 'api.ping');

    $app->route('/login', Handler\LoginHandler::class, ['GET', 'POST'], 'login');
    $app->route('/logout', Handler\LogoutHandler::class, ['GET'], 'logout');
    $app->route('/register', Handler\RegisterHandler::class, ['GET', 'POST'], 'register');

    $app->get('/dashboard', Handler\DashboardHandler::class, 'dashboard');
    $app->get('/section/:id', Handler\SectionHandler::class, 'section');
    $app->get('/lesson/:sectionId/:lessonId/:mode', Handler\LessonHandler::class, 'lesson');
    $app->get('/lesson/:sectionId/:lessonId/cards', Handler\CardsHandler::class, 'cards');
};
