<?php
namespace App\Enums;

class CategoryEnum {
    const TYPE_ACTIVE = 1;
    const STORY_ACTIVE_TEXT = 'فعال';
    const TYPE_DISABLE = '0';
    const TYPE_DISABLE_TEXT = 'غیر فعال';

    const STORY_ACCEPTED = 'accepted';
    const STORY_ACCEPTED_TEXT = 'تایید شده';

    const STORY_CHECKING = 'checking';
    const STORY_CHECKING_TEXT = 'در حال بررسی';

    const STORY_UNACCEPTED= 'unaccepted';
    const STORY_UNACCEPTED_TEXT = 'رد شده';

    const STORY_DISABLE = 'disable';
    const STORY_DISABLE_TEXT = 'غیرفعال شده';

    const ROLE_ADMIN = 'admin';
    const ROLE_ADMIN_TEXT = 'مدیر';

    const ROLE_USER = 'user';
    const ROLE_USER_TEXT = 'کاربر عادی';

    const ROLE_STAFF = 'staff';
    const ROLE_STAFF_TEXT = 'کارمند';

    const ROLE_MARKETER = 'marketer';
    const ROLE_MARKETER_TEXT = 'بازاریاب';

    const GENDER_MALE = 'male';
    const GENDER_MALE_TEXT = 'مرد';

    const GENDER_FEMALE = 'female';
    const GENDER_FEMALE_TEXT = 'زن';

    const TYPE_PAID = 'paid';
    const TYPE_PAID_TEXT = 'پولی';

    const TYPE_FREE = 'free';
    const TYPE_FREE_TEXT = 'رایگان';
}