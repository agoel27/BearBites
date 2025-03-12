<?php

namespace App\Enum;

enum PermissionsEnum: string
{
    case ViewAndEditProfile = "view_and_edit_profile";
    case BrowseMenu = "browse_menu";
    case PlaceOrder = "place_order";
    case ViewDeliveryStatus = "view_delivery_status";
    case UpdateDeliveryInfo = "update_delivery_info";
    case UpdateMenu = "update_menu";
    case ManageRoles = 'manage_roles';
    case ManageLogin = 'manage_login';
}
