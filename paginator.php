<?php
class Paginator {
  private $sql = '';

  function __construct($sql) {
    $this->sql = $sql;
  }

  function getPaginatedSQL() {
    return " {$this->sql} LIMIT :offset, :limit";
  }

  function getLinkPrevious($currentPage = 1, $limit = 10) {
    $previousPage = $currentPage - 1;
    if($previousPage < 0) {
      return '<a class="not-visible" > << </a>';
    }
    return "<a href=\"?page={$previousPage}&limit={$limit}\"> << </a>";
  }

  function getLinkNext($currentPage = 1, $limit = 10) {
    $nextPage = $currentPage + 1;
    return "<a href=\"?page={$nextPage}&limit={$limit}\"> >> </a>";
  }
}
?>
