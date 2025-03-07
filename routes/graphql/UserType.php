<?php

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user',
        'model' => \App\Models\User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the user',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of the user',
            ],
            'email_verified_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email verified at of the user',
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The password of the user',
            ],
            'remember_token' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The remember token of the user',
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The created_at of the user',
                'resolve' => function($model) {
                    return $model->created_at;
                }
            ],
            'updated_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The updated_at of the user',
                'resolve' => function($model) {
                    return $model->updated_at;
                }
            ],
            'is_admin' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'The is_admin of the user',
            ],
            'deleted_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The deleted_at of the user',
                'resolve' => function($model) {
                    return $model->deleted_at;
                }
            ]
        ];
    }
}
