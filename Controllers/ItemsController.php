<?php

namespace App\Controllers;

use App\Core\Attributes\Route;
use App\Core\Classes\SuperGlobals\Request;
use App\Core\Classes\Validator;
use App\Core\System\Controller;
use App\Models\Item_TypesModel;
use App\Models\ItemsModel;

final class ItemsController extends Controller {

    #[Route('/items', 'items', ['GET', 'POST'])] public function index(Request $request) {
        if (!$this->isAuthenticated()) {
            $this->redirect(self::reverse('login'));
        } else {
            $items = new ItemsModel();

            if(isset($_POST['row'])) {
                if(isset($_POST['delete'])) {
                    $i = 0;
                    foreach ($_POST['row'] as $row) {
                        $i++;
                        $items->delete($row);
                    }
                    $this->addFlash('success', "{$i} entrées supprimées");
                    $this->redirect(header: 'items', response_code: 301);
                }
            }

            $items = $items->findAll();
            $data = [];
            $i = 0;

            foreach ($items as $item) {
                $data[$i]['id'] = $item->getId();
                $data[$i]['item_type_id'] = $item->getItemTypeId();
                $data[$i]['description'] = $item->getDescription();
                $data[$i]['level'] = $item->getLevel();
                $i++;
            }

            $this->render(name_file: 'items/index', params: [
                'data'=> $data
            ], title: 'items');
        };
    }

    #[Route('/items/types', 'items_types', ['GET', 'POST'])] public function itemsTypes(Request $request) {
        if (!$this->isAuthenticated()) {
            $this->redirect(self::reverse('login'));
        } else {

            $item_types = new Item_TypesModel();

            if(isset($_POST['row'])) {
                if(isset($_POST['delete'])) {
                    $i = 0;
                    foreach ($_POST['row'] as $row) {
                        $i++;
                        $item_types->delete($row);
                    }
                    $this->addFlash('success', "{$i} entrées supprimées");
                    $this->redirect(header: 'items/types', response_code: 301);
                }
            }

            $item_types = $item_types->findAll();
            $data = [];
            $i = 0;

            foreach ($item_types as $item_type) {
                $data[$i]['item_type_id'] = $item_type->getId();
                $data[$i]['name'] = $item_type->getName();
                $i++;
            }

            $this->render(name_file: 'items/items_types', params: [
                'data'=> $data
            ], title: 'Items types');
        };
    }
}