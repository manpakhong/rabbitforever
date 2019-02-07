<?php
interface ReusablePool{
	public function acquireReusable();
	public function setMaxPoolSize($maxPoolSize);
}
?>