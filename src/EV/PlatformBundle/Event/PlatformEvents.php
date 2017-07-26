<?php

//Cette classe ne fait rien, elle ne sert qu'à faire la correspondance entre PlatformEvents::POST_MESSAGE qui sera
//utilisé pour déclencher l'évènement et le nom de l'évènement lui même ev_plpatform.post_message

namespace EV\PlatformBundle\Event;


final class PlatformEvents
{
    const POST_MESSAGE = 'ev_platform.post_message';
}