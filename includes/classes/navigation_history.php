<?php
/*
  $Id: navigation_history.php,v 1.2 2002/08/01 10:55:27 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  class navigationHistory {
    var $path, $snapshot;

    function navigationHistory() {
      $this->reset();
    }

    function reset() {
      $this->path = array();
      $this->snapshot = array();
    }

    function add_current_page() {
      global $PHP_SELF, $HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_SERVER_VARS, $cPath;

      $set = 'true';
      for ($i=0; $i<sizeof($this->path); $i++) {
        if ( ($this->path[$i]['page'] == basename($PHP_SELF)) ) {
          if ($cPath) {
            if (!$this->path[$i]['get']['cPath']) {
              continue;
            } else {
              if ($this->path[$i]['get']['cPath'] == $cPath) {
                array_splice($this->path, ($i+1));
                $set = 'false';
                break;
              } else {
                $old_cPath = explode('_', $this->path[$i]['get']['cPath']);
                $new_cPath = explode('_', $cPath);

                for ($j=0; $j<sizeof($old_cPath); $j++) {
                  if ($old_cPath[$j] != $new_cPath[$j]) {
                    array_splice($this->path, ($i));
                    $set = 'true';
                    break 2;
                  }
                }
              }
            }
          } else {
            array_splice($this->path, ($i));
            $set = 'true';
            break;
          }
        }
      }

      if ($set == 'true') {
        $this->path[] = array('page' => basename($PHP_SELF),
                              'mode' => (($HTTP_SERVER_VARS['HTTPS'] == 'on') ? 'SSL' : 'NONSSL'),
                              'get' => $HTTP_GET_VARS,
                              'post' => $HTTP_POST_VARS);
      }
    }

    function set_snapshot($page = '') {
      global $PHP_SELF, $HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_SERVER_VARS;

      if (is_array($page)) {
        $this->snapshot = array('page' => $page['page'],
                                'mode' => $page['mode'],
                                'get' => $page['get'],
                                'post' => $page['post']);
      } else {
        $this->snapshot = array('page' => basename($PHP_SELF),
                                'mode' => (($HTTP_SERVER_VARS['HTTPS'] == 'on') ? 'SSL' : 'NONSSL'),
                                'get' => $HTTP_GET_VARS,
                                'post' => $HTTP_POST_VARS);
      }
    }

    function clear_snapshot() {
      $this->snapshot = array();
    }

    function set_path_as_snapshot($history = 0) {
      $this->snapshot = array('page' => $this->path[(sizeof($this->path)-1-$history)]['page'],
                              'mode' => $this->path[(sizeof($this->path)-1-$history)]['mode'],
                              'get' => $this->path[(sizeof($this->path)-1-$history)]['get'],
                              'post' => $this->path[(sizeof($this->path)-1-$history)]['post']);
    }

    function debug() {
      for ($i=0; $i<sizeof($this->path); $i++) {
        echo $this->path[$i]['page'] . '?';
        while (list($key, $value) = each($this->path[$i]['get'])) {
          echo $key . '=' . $value . '&';
        }
        if (sizeof($this->path[$i]['post']) > 0) {
          echo '<br>';
          while (list($key, $value) = each($this->path[$i]['post'])) {
            echo '&nbsp;&nbsp;<b>' . $key . '=' . $value . '</b><br>';
          }
        }
        echo '<br>';
      }

      if (sizeof($this->snapshot) > 0) {
        echo '<br><br>';

        echo $this->snapshot['mode'] . ' ' . $this->snapshot['page'] . '?' . tep_array_to_string($this->snapshot['get'], array(tep_session_name())) . '<br>';
      }
    }

    function unserialize($broken) {
      for(reset($broken);$kv=each($broken);) {
        $key=$kv['key'];
        if (gettype($this->$key)!="user function")
        $this->$key=$kv['value'];
      }
    }
  }
?>