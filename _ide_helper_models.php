<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property string $logo
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Job
 *
 * @property int $id
 * @property string $title
 * @property string $contract
 * @property string $location
 * @property string $created_at
 * @property int $role_id
 * @property int $level_id
 * @property int $company_id
 * @property int $active
 * @property int $new
 * @property int $featured
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Language[] $languages
 * @property-read int|null $languages_count
 * @property-read \App\Models\Level $level
 * @property-read \App\Models\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tool[] $tools
 * @property-read int|null $tools_count
 * @method static \Illuminate\Database\Eloquent\Builder|Job active()
 * @method static \Illuminate\Database\Eloquent\Builder|Job allRelations()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereTitle($value)
 */
	class Job extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 */
	class Language extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Level
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level query()
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereUpdatedAt($value)
 */
	class Level extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tool
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereUpdatedAt($value)
 */
	class Tool extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

