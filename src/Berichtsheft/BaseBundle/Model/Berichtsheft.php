<?php

namespace Berichtsheft\BaseBundle\Model;

class Berichtsheft
{
  /**
   * @var AzubiInterface
   */
  private $azubi;

  /**
   * @var \DateTime
   */
  private $from;

  /**
   * @var \DateTime
   */
  private $to;

  /**
   * @var BerichtsheftItem[]
   */
  private $items;

  /**
   * @var string
   */
  private $comment;

  /**
   * @var int
   */
  private $number;

  /**
   * @param AzubiInterface $azubi
   * @param \DateTime $from
   * @param \DateTime $to
   * @param int $number
   */
  function __construct(AzubiInterface $azubi, \DateTime $from, \DateTime $to, $number)
  {
    $this->azubi = $azubi;
    $this->from = $from;
    $this->to = $to;
    $this->number = $number;
  }


  /**
   * @param \Berichtsheft\BaseBundle\Model\AzubiInterface $azubi
   */
  public function setAzubi($azubi)
  {
    $this->azubi = $azubi;
  }

  /**
   * @return \Berichtsheft\BaseBundle\Model\AzubiInterface
   */
  public function getAzubi()
  {
    return $this->azubi;
  }

  /**
   * @param string $comment
   */
  public function setComment($comment)
  {
    $this->comment = $comment;
  }

  /**
   * @return string
   */
  public function getComment()
  {
    return $this->comment;
  }

  /**
   * @param \DateTime $from
   */
  public function setFrom($from)
  {
    $this->from = $from;
  }

  /**
   * @return \DateTime
   */
  public function getFrom()
  {
    return $this->from;
  }

  /**
   * @param \DateTime $to
   */
  public function setTo($to)
  {
    $this->to = $to;
  }

  /**
   * @return \DateTime
   */
  public function getTo()
  {
    return $this->to;
  }

  /**
   * @param \Berichtsheft\BaseBundle\Model\BerichtsheftItem[] $items
   */
  public function setItems($items)
  {
    $this->items = $items;
  }

  /**
   * @return \Berichtsheft\BaseBundle\Model\BerichtsheftItem[]
   */
  public function getItems()
  {
    $items = $this->items;
    usort($items, array(get_class($this), 'sortingItems'));
    return $items;
  }

  /**
   * @param int $number
   */
  public function setNumber($number)
  {
    $this->number = $number;
  }

  /**
   * @return int
   */
  public function getNumber()
  {
    return $this->number;
  }

  /**
   * @return string
   */
  public function getFileName()
  {
    return $this->getNumber() . '_berichtsheft_' . $this->getFrom()->format('d.m.Y') . '-' . $this->getTo()->format('d.m.Y');
  }

  /**
   * Sorting BerichtsheftItems
   * @param BerichtsheftItem $a
   * @param BerichtsheftItem $b
   * @return int
   */
  public static function sortingItems(BerichtsheftItem $a, BerichtsheftItem $b)
  {
    if ($a->getDate() == $b->getDate()) {
      return 0;
    }
    return ($a->getDate() < $b->getDate()) ? -1 : 1;
  }

} 