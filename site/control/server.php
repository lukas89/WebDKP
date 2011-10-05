<?php
include_once("lib/dkp/dkpPointsTable.php");
include_once("lib/dkp/dkpUpdater.php");
include_once("lib/wow/armory.php");
include_once("dkpmain.php");
/*=================================================
The news page displays news to the user.
=================================================*/
class pageServer extends pageDkpMain {


	var $layout = "Columns1";
	/*=================================================
	Shows a list of posts to the user. The user has
	links to skip to any page of the posts
	=================================================*/
	function area2()
	{
		//no adds on server page
		$GLOBALS["ShowAds"] = false;

		if($this->IsServerError())
			return $this->ShowServerError();


		global $sql;

		$server = $this->GetServer();

		$this->pagetitle = "Browsing ".$server->name;
		$this->title = "Browsing ".$server->name;
		$this->border = 1;

		$guilds = dkpUtil::GetGuildsOnServer($server->name);
		$this->set("active","guilds");
		$this->set("guilds",$guilds);
		return $this->fetch("server.tmpl.php");
	}


}
?>