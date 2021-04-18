<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\User;
use Illuminate\Support\Facades\Hash;




class Users extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function store(Store $request){
        $requestArray = $request->all();
        $requestArray['password'] = Hash::make($requestArray['password']);
        $this->model->create($requestArray);
        return redirect()->route('users.index');
    }
    public function destroy($id){
        $this->model->FindOrFail($id)->delete();
        return redirect()->route($this->getClassNameFromModel().'.index');
    }

    public function edit($id){
        $row = $this->model->FindOrFail($id);
        $moduleName = $this->getModelName();
        $pageTitle = "Edit " . $moduleName;
        $pageDes = "Here you can edit" .$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;


        return view ('admin.'.$folderName.'.edit' , compact('row',
            'pageTitle',
            'moduleName',
            'pageDes',
            'folderName',
            'routeName'
        ));

    }
    public function update($id , Update $request){
        $row = $this->model->FindOrFail($id);

        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != "" ){
            $requestArray['password'] = Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }


        $row->update($requestArray);
        return redirect()->back();



    }

}
