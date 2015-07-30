<?php
namespace Application\Block\ImageContent;
use \File;
use \Concrete\Core\Block\BlockController;

	class Controller extends BlockController {

		protected $btInterfaceWidth = "600";
		protected $btInterfaceHeight = "550";
		protected $btCacheBlockRecord = true;
		protected $btCacheBlockOutput = true;
		protected $btCacheBlockOutputOnPost = true;
		protected $btCacheBlockOutputForRegisteredUsers = true;
		protected $btExportFileColumns = array('fID');
		protected $btTable = 'btImageContent';

		public function getBlockTypeDescription() {
			return t("画像と文章を横並びにして表示するブロック");
		}

		public function getBlockTypeName() {
			return t("Image Content");
		}

		public function view() {
			$f = File::getByID($this->fID);
			if (!is_object($f) || !$f->getFileID()) {
				return false;
			}
	
			$this->set('f', $f);
			$this->set('title',$this->getTitle());
		}
		function getFileID() {return $this->fID;}
		public function getFileObject() {
			return File::getByID($this->fID);
		}
		function getTitle() {return $this->title;}
	
		public function getSearchableContent()
		{
			return $this->title . ' ' . $this->content;
		}

		function save($args) {
			$args['fID'] = ($args['fID'] != '') ? $args['fID'] : 0;
			parent::save($args);
		}

	}
