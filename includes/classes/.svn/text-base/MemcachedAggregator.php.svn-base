<?php
class MemcachedAggregator {
    var $connections;

    public function __construct($servers) {
    // Attempt to establish/retrieve persistent connections to all servers.
    // If any of them fail, they just don't get put into our list of active
    // connections.
    $this->connections = array();
    for ($i = 0, $n = count($servers); $i < $n; $i++) {
        $server = $servers[$i];
        $con = @memcache_connect($server['host'], $server['port']);

        if (!($con == false)) {
        $this->connections[] = $con;
        }
    }
    }

    private function _getConForKey($key) {
    $hashCode = 0;
    for ($i = 0, $len = strlen($key); $i < $len; $i++) {
        $hashCode = (int)(($hashCode*33)+ord($key[$i])) & 0x7fffffff;
    }
    if (($ns = count($this->connections)) > 0) {
        return $this->connections[$hashCode%$ns];
    }
    return false;
    }
	public function serverStatus() {
		$good_connection=0;
		if (($ns = count($this->connections)) > 0)
			return true;
		else
			return false;
	}
    public function debug($on_off) {
    $result = false;
    for ($i = 0; $i < count($connections); $i++) {
        if ($this->connections[$i]->debug($on_off)) $result = true;
    }
    return $result;
    }

    public function flush() {
    $result = false;
    for ($i = 0; $i < count($connections); $i++) {
        if ($this->connections[$i]->flush()) $result = true;
    }
    return $result;
    }

/// The following are not implemented:
///getStats()
///getVersion()

    public function get($key) {
    if (is_array($key)) {
        $dest = array();
        foreach ($key as $subkey) {
        $val = get($subkey);
        if (!($val === false)) $dest[$subkey] = $val;
        }
        return $dest;
    } else {
        return $this->_getConForKey($key)->get($key);
    }
    }

    public function set($key, $var, $compress=0, $expire=0) {
    return $this->_getConForKey($key)->set($key, $var, $compress, $expire);
    }

    public function add($key, $var, $compress=0, $expire=0) {
    return $this->_getConForKey($key)->add($key, $var, $compress, $expire);
    }

    public function replace($key, $var, $compress=0, $expire=0) {
    return $this->_getConForKey($key)->replace
        ($key, $var, $compress, $expire);
    }

    public function delete($key, $timeout=0) {
    return $this->_getConForKey($key)->delete($key, $timeout);
    }

    public function increment($key, $value=1) {
    return $this->_getConForKey($key)->increment($key, $value);
    }

    public function decrement($key, $value=1) {
    return $this->_getConForKey($key)->decrement($key, $value);
    }
	public function close()
	{
		$this->_getConForKey($key)->close();
	}
}
?>
