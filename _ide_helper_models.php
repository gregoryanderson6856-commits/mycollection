<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int|null $band_id
 * @property string $title
 * @property string $label
 * @property string|null $year
 * @property numeric $price
 * @property string $format
 * @property string $path
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Band|null $bands
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Song> $songs
 * @property-read int|null $songs_count
 * @method static \Database\Factories\AlbumFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereBandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Album whereYear($value)
 */
	class Album extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $band_id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Album> $albums
 * @property-read int|null $albums_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Musician> $musicians
 * @property-read int|null $musicians_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band whereBandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Band whereUpdatedAt($value)
 */
	class Band extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $itemable_type
 * @property int $itemable_id
 * @property int $quantity
 * @property numeric $price_at_addition
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $type_label
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $itemable
 * @method static \Database\Factories\CartItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereItemableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereItemableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem wherePriceAtAddition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CartItem whereUserId($value)
 */
	class CartItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryMap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryMap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryMap query()
 */
	class CategoryMap extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $sku
 * @property string $title
 * @property string $story
 * @property numeric $price
 * @property string $month
 * @property string $year
 * @property string $version
 * @property string $imagePath
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereStory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comicbook whereYear($value)
 */
	class Comicbook extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Band|null $bands
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Musician whereUpdatedAt($value)
 */
	class Musician extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $order_number
 * @property numeric $grand_total
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $order_id
 * @property string $itemable_type
 * @property int $itemable_id
 * @property int $quantity
 * @property numeric $price_at_purchase
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $itemable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereItemableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereItemableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem wherePriceAtPurchase($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereUpdatedAt($value)
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property string $sku
 * @property string|null $size
 * @property string $month
 * @property string $year
 * @property numeric $price
 * @property string $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $framed
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @method static \Database\Factories\PaintingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereFramed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Painting whereYear($value)
 */
	class Painting extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $song_id
 * @property int|null $album_id
 * @property string $title
 * @property string|null $songwriter
 * @property string|null $duration
 * @property int $side
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Album|null $albums
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereSongId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereSongwriter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Song whereUpdatedAt($value)
 */
	class Song extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property numeric $price
 * @property string $month
 * @property string $year
 * @property string $imagePath
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tabletalk whereYear($value)
 */
	class Tabletalk extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $role
 * @property int $admin
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

