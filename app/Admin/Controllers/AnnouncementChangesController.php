<?php

namespace App\Admin\Controllers;

use App\Models\Announcement;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;
use App\Services\AnnouncementService;

/**
 *中止公告
 *
 */
class AnnouncementChangesController extends AnnouncementsController
{
    public function __construct(AnnouncementService $announcementService)
    {
        $processes = [151,152,153,154,155,159];
        parent::__construct($announcementService);
        $this->module_type = 'bggg';
    }

}