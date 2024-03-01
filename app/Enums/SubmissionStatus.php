<?php

namespace App\Enums;

enum SubmissionStatus : string
{
    case Submitted = 'submitted';
    case InReview = 'in_review';
    case Accepted = 'accepted';
    case Rejected = 'rejected';
}
