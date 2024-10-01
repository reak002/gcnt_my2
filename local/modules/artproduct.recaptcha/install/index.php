<?

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bex\D7dull\ExampleTable;

Class Artproduct_recaptcha extends CModule
{

	private $execlusionAdminFiles = array('menu.php','.','..');

    public function __construct()
    {
        $arModuleVersion = array();

        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_ID = 'artproduct.recaptcha';
        $this->MODULE_NAME = Loc::getMessage('SUBCUSTOM_DUPLICATE_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('SUBCUSTOM_DUPLICATE_MODULE_DESCRIPTION');
        $this->MODULE_GROUP_RIGHTS = 'N';
        $this->PARTNER_NAME = Loc::getMessage('SUBCUSTOM_DUPLICATE_MODULE_PARTNER_NAME');
        $this->PARTNER_URI = 'https://www.enisey-servis.ru/';
    }

    public function doInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $this->InstallFiles();
        $this->InstallEvents();
    }

    public function doUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);
        $this->unInstallFiles();
        $this->unInstallEvents();
    }

	function installFiles()
	{
		if (Bitrix\Main\IO\Directory::isDirectoryExists($path=$this->GetPath().'/admin'))
		{
			if ($dir =  opendir($path))
			{
				while(false !== $item = readdir($dir))
				{
					if(in_array($item, $this->execlusionAdminFiles))
					{
						continue;
					}
					$subName = str_replace('.','_',$this->MODULE_ID);
					file_put_contents($_SERVER['DOCUMENT_ROOT'].'/bitrix/admin/'.$subName.'_'.$item,
						'<'.'? require_once($_SERVER["DOCUMENT_ROOT"]."'.$this->GetPath(true).'/admin/'.$item.'");?'.'>');
				}
				closedir($dir);
			}
		}
	}
	function GetPath($notDocumentRoot=false)
	{
		return  ($notDocumentRoot)
			? preg_replace('#^(.*)\/(local|bitrix)\/modules#','/$2/modules',dirname(__DIR__))
			: dirname(__DIR__);
	}
}
?>