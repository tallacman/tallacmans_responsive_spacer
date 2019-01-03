<?php namespace Concrete\Package\TallacmansResponsiveSpacer\Block\TallacmansResponsiveSpacer;

defined("C5_EXECUTE") or die("Access Denied.");

use Concrete\Core\Block\BlockController;
use Core;

class Controller extends BlockController
{
    public $btFieldsRequired = [];
    protected $btTable = 'btTallacmansResponsiveSpacer';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;
    protected $btIgnorePageThemeGridFrameworkContainer = false;
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $pkg = 'tallacmans_responsive_spacer';

    public function getBlockTypeDescription()
    {
        return t("Change your spacing as your screen size changes.");
    }

    public function getBlockTypeName()
    {
        return t("Responsive Spacer");
    }

    public function view() // these are the values returned to the view
    {
        $vsScreen_options = [
            '' => "",
            '1' => "1rem",
            '2' => "2rem",
            '3' => "3rem",
            '4' => "4rem",
            '5' => "5rem",
            '6' => "6rem",
            '7' => "7rem",
            '8' => "8rem",
            '9' => "9rem",
            '10' => "10rem"
        ];
        $this->set("vsScreen_options", $vsScreen_options);
        $smScreen_options = [
            '' => "",
            '1' => "1rem",
            '2' => "2rem",
            '3' => "3rem",
            '4' => "4rem",
            '5' => "5rem",
            '6' => "6rem",
            '7' => "7rem",
            '8' => "8rem",
            '9' => "9rem",
            '10' => "10rem"
        ];
        $this->set("smScreen_options", $smScreen_options);
        $mdScreen_options = [
            '' => "",
            '1' => "1rem",
            '2' => "2rem",
            '3' => "3rem",
            '4' => "4rem",
            '5' => "5rem",
            '6' => "6rem",
            '7' => "7rem",
            '8' => "8rem",
            '9' => "9rem",
            '10' => "10rem"
        ];
        $this->set("mdScreen_options", $mdScreen_options);
        $dtScreen_options = [
            '' => "",
            '1' => "1rem",
            '2' => "2rem",
            '3' => "3rem",
            '4' => "4rem",
            '5' => "5rem",
            '6' => "6rem",
            '7' => "7rem",
            '8' => "8rem",
            '9' => "9rem",
            '10' => "10rem"
        ];
        $this->set("dtScreen_options", $dtScreen_options);
        $vlScreen_options = [
            '' => "",
            '1' => "1rem",
            '2' => "2rem",
            '3' => "3rem",
            '4' => "4rem",
            '5' => "5rem",
            '6' => "6rem",
            '7' => "7rem",
            '8' => "8rem",
            '9' => "9rem",
            '10' => "10rem"
        ];
        $this->set("vlScreen_options", $vlScreen_options);
    }

    public function add()
    {
        $this->addEdit();
    }

    public function edit()
    {
        $this->addEdit();
    }

    protected function addEdit() // these are the values displayed in the controller
    {
        $this->set("vsScreen_options", [
                '' => "-- " . t("None") . " --",
                '1' => "1rem",
                '2' => "2rem",
                '3' => "3rem",
                '4' => "4rem",
                '5' => "5rem",
                '6' => "6rem",
                '7' => "7rem",
                '8' => "8rem",
                '9' => "9rem",
                '10' => "10rem"
            ]
        );
        $this->set("smScreen_options", [
                '' => "-- " . t("None") . " --",
                '1' => "1rem",
                '2' => "2rem",
                '3' => "3rem",
                '4' => "4rem",
                '5' => "5rem",
                '6' => "6rem",
                '7' => "7rem",
                '8' => "8rem",
                '9' => "9rem",
                '10' => "10rem"
            ]
        );
        $this->set("mdScreen_options", [
                '' => "-- " . t("None") . " --",
                '1' => "1rem",
                '2' => "2rem",
                '3' => "3rem",
                '4' => "4rem",
                '5' => "5rem",
                '6' => "6rem",
                '7' => "7rem",
                '8' => "8rem",
                '9' => "9rem",
                '10' => "10rem"
            ]
        );
        $this->set("dtScreen_options", [
                '' => "-- " . t("None") . " --",
                '1' => "1rem",
                '2' => "2rem",
                '3' => "3rem",
                '4' => "4rem",
                '5' => "5rem",
                '6' => "6rem",
                '7' => "7rem",
                '8' => "8rem",
                '9' => "9rem",
                '10' => "10rem"
            ]
        );
        $this->set("vlScreen_options", [
                '' => "-- " . t("None") . " --",
                '1' => "1rem",
                '2' => "2rem",
                '3' => "3rem",
                '4' => "4rem",
                '5' => "5rem",
                '6' => "6rem",
                '7' => "7rem",
                '8' => "8rem",
                '9' => "9rem",
                '10' => "10rem"
            ]
        );
        $this->set('btFieldsRequired', $this->btFieldsRequired);
        $this->set('identifier_getString', Core::make('helper/validation/identifier')->getString(18));
    }

    public function validate($args)
    {
        $e = Core::make("helper/validation/error");
        if ((in_array("vsScreen", $this->btFieldsRequired) && (!isset($args["vsScreen"]) || trim($args["vsScreen"]) == "")) || (isset($args["vsScreen"]) && trim($args["vsScreen"]) != "" && !in_array($args["vsScreen"], ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"]))) {
            $e->add(t("The %s field has an invalid value.", t("Phones - Portrait Orientation")));
        }
        if ((in_array("smScreen", $this->btFieldsRequired) && (!isset($args["smScreen"]) || trim($args["smScreen"]) == "")) || (isset($args["smScreen"]) && trim($args["smScreen"]) != "" && !in_array($args["smScreen"], ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"]))) {
            $e->add(t("The %s field has an invalid value.", t("Phones - Landscape Orientation")));
        }
        if ((in_array("mdScreen", $this->btFieldsRequired) && (!isset($args["mdScreen"]) || trim($args["mdScreen"]) == "")) || (isset($args["mdScreen"]) && trim($args["mdScreen"]) != "" && !in_array($args["mdScreen"], ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"]))) {
            $e->add(t("The %s field has an invalid value.", t("Tablets")));
        }
        if ((in_array("dtScreen", $this->btFieldsRequired) && (!isset($args["dtScreen"]) || trim($args["dtScreen"]) == "")) || (isset($args["dtScreen"]) && trim($args["dtScreen"]) != "" && !in_array($args["dtScreen"], ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"]))) {
            $e->add(t("The %s field has an invalid value.", t("Desktops")));
        }
        if ((in_array("vlScreen", $this->btFieldsRequired) && (!isset($args["vlScreen"]) || trim($args["vlScreen"]) == "")) || (isset($args["vlScreen"]) && trim($args["vlScreen"]) != "" && !in_array($args["vlScreen"], ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"]))) {
            $e->add(t("The %s field has an invalid value.", t("Very Large Screens")));
        }
        return $e;
    }

    public function composer()
    {
        $this->edit();
    }
}
