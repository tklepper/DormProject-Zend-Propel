<?php

namespace Dorm\Controller;

use \User;
use \UserQuery;
use \UnitQuery;
use \Unit;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class DormController extends AbstractActionController
{
    public function usersAction()
    {
        $users = UserQuery::create()->leftJoinWith('User.Unit')->find();
        

        return new JsonModel([
            'status' => 'success',
            'data' => $users->toArray()
        ]);
    }

    public function unitsAction()
    {
        $units = UnitQuery::create()->leftJoinWith('Unit.User')->find();

        return new JsonModel([
            'status' => 'success',
            'data' => $units->toArray()
        ]);
    }

    public function addAction()
    {
        $request = ($this->getRequest())->getPost();
        //$units = UnitQuery::create()->find();
        
        $user = new User();
        $user->setName($request->name);
        $user->setEmail($request->email);
        $user->setStreet($request->street);
        $user->setCity($request->city);
        $user->setState($request->state);
        $user->setZip($request->zip);
        $user->setPhone($request->phone);
        $user->setGender($request->gender);
        $user->setDob($request->dob);
        $user->setStudentId($request->student_id);
        
        $units = UnitQuery::create()->find();
        $availability = false;
        foreach($units as $unit){
            $unit_users = $unit->getUsers();
            if($request->building_number == $unit->getBuildingNumber()){
                if($unit_users->count()>0){
                    if(count($unit_users->count()<8)){
                        foreach($unit_users as $roommate){
                            if($roommate->getGender()==$request->gender){
                                $user->setUnit($unit);
                                $user->save();
                                return new JsonModel([
                                    'status' => 'success',
                                    'data' => [
                                        'user' => $user->toJSON()
                                    ]
                                ]);
                                
                            }
                        }
                    } 
                } else {
                    $user->setUnit($unit);
                    $user->save();
                    return new JsonModel([
                        'status' => 'success',
                        'data' => [
                            'user' => $user->toJSON()
                        ]
                    ]);
                }
            }
        }
        
        

   

        return new JsonModel([
            'status' => 'failed',
            'data' => [
                'unit' => $unit->toJSON()
            ]
        ]);
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}