<?php
/**
 * Created by PhpStorm.
 * User: Sienio
 * Date: 06.09.2017
 * Time: 20:37
 */

namespace AppBundle\EventDispatcher;


use AppBundle\Entity\Auction;
use Symfony\Component\EventDispatcher\Event;

class AuctionEvent extends Event
{
    /**
     * @var Auction
     */
    private $auction;
    public function __construct(Auction $auction)
    {
        $this->auction=$auction;
    }

    /**
     * @return Auction
     */
    public function getAuction()
    {
        return $this->auction;
    }

}