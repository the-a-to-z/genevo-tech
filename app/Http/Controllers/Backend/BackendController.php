<?php

namespace App\Http\Controllers\Backend;

use App\Menu;
use App\Permission;
use App\RolePermission;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class BackendController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public $userAccessMenus, $topMenus, $leftMenus, $loggedInUser, $userPermissions;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->loggedInUser = Auth::user();

        $this->userAccessMenus = $this->getMenus();
        $this->topMenus = $this->getTopMenus($this->userAccessMenus);
        $this->leftMenus = $this->getLeftMenus($this->userAccessMenus);

        $this->userPermissions = $this->getUserPermission();

        $this->passDataToView();
    }

    public function getMenus()
    {
        $menu = new Menu();

        return $menu->findByRole($this->loggedInUser->role_id);
    }

    public function getTopMenus($userAccessMenus)
    {
        return array_filter($userAccessMenus, function ($r) {
            return $r->position == 'top';
        });
    }

    public function getLeftMenus($userAccessMenus)
    {
        return array_filter($userAccessMenus, function ($r) {
            return $r->position == 'left';
        });
    }

    public function passDataToView()
    {
        View::share('topMenus', $this->topMenus);
        View::share('leftMenus', $this->leftMenus);
        View::share('permissions', $this->userPermissions);
        View::share('loggedInUser', $this->loggedInUser);
    }

    public function getUserPermission()
    {
        return RolePermission::with('permission')->where('role_id', $this->loggedInUser->role_id)->get();
    }

    public function registerPermissionAs($permission)
    {
        if($this->hasPermission($permission) == false) {
            $this->actionLogout();
        }
    }

    public function checkActionOnHimself($permission, $loggedInUserData, $actionTargetData)
    {
        if(($loggedInUserData != $actionTargetData)) {
            return true;
        }
        return $this->hasPermission($permission);
    }

    public function runFailCheckActionOnHimself($permission, $loggedInUserData, $actionTargetData)
    {
        if(!$this->checkActionOnHimself($permission, $loggedInUserData, $actionTargetData)) {
            return $this->actionLogout();
        }
    }

    public function actionLogout()
    {
        Auth::logout();

        return Redirect::to('login')->with('status', 'Permission problem!')->send();
    }

    public function hasPermission($permission)
    {
        $permissionCheck = 0;
        if(is_array($permission)) {
            foreach($this->userPermissions as $userPermission) {
                if(in_array($userPermission->permission->name, $permission)) {
                    $permissionCheck++;
                }
            }

            return count($permission) == $permissionCheck;
        }

        foreach($this->userPermissions as $userPermission) {
            if($permission == $userPermission->permission->name) {
                return true;
            }
        }

        return false;
    }

    public function uploadPath($fileName = null)
    {
        return public_path(uploadPath($this->uploadDir . '/'. $fileName));
    }

    public function uploadPathThumbnail($fileName = null)
    {
        return public_path(uploadPath($this->uploadDir . '/thumbnail/' . $fileName));
    }

}
