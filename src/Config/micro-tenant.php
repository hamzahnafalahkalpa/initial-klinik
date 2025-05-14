<?php

return [
    'database' => [
        'model_connections' => [
            "central"        => [
                "ApiAccess",
                "Cache",
                "CacheLock",
                "Country",
                "District",
                "Domain",
                "FailedJob",
                "JobBatch",
                "Job",
                "PasswordResetToken",
                "PayloadMonitoring",
                "PersonalAccessToken",
                "Province",
                "Subdistrict",
                "Tenant",
                "UserReference",
                "User",
                "Village",
                "Workspace"
            ],
            "central_app"    => [
                "Encoding",
                "MasterFeature",
                "ModelHasFeature"
            ],
            "central_tenant" => []
        ]
    ],
];