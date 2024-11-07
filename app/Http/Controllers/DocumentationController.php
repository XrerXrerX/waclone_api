<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Whatsapp Clone OpenAPI Documentation",
 *      description="API Documentation for wa-clone",
 *      @OA\Contact(
 *          email="lintasinovasiglobal@gmail.com"
 *      )
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT"
 * )
 */
class DocumentationController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/login",
     *      summary="User Login/sign-in",
     *      tags={"Authentication"},
     *      @OA\Parameter(
     *          name="tokenValidation",
     *          in="header",
     *          required=true,
     *          description="Put your given token on header tokenValidation",
     *          @OA\Schema(
     *              type="string",
     *              example="5ljrZQkAxtHpEjKfTRKblN7IwFU9sSyO"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="email", type="string", example="admin@gmail.com"),
     *              @OA\Property(property="password", type="string", example="Superadmin111!!!")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Login successful",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="string", example="Success"),
     *              @OA\Property(property="message", type="string", example="Login successful"),
     *              @OA\Property(property="user",
     *                  type="object",
     *                  @OA\Property(property="id", type="integer", example=1),
     *                  @OA\Property(property="name", type="string", example="superadmin"),
     *                  @OA\Property(property="email", type="string", example="admin@gmail.com"),
     *                  @OA\Property(property="email_verified_at", type="string", nullable=true, example=null),
     *                  @OA\Property(property="created_at", type="string", example="2024-11-05T13:40:13.000000Z"),
     *                  @OA\Property(property="updated_at", type="string", example="2024-11-05T13:40:13.000000Z")
     *              ),
     *              @OA\Property(property="token", type="string", example="<RANDOM_INTEGER>|<RANDOM_TOKEN>")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized: Either the token is invalid, or the username/password is incorrect.",
     *          @OA\JsonContent(
     *              oneOf={
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="status", type="string", example="Fail"),
     *                      @OA\Property(property="message", type="string", example="Invalid username or password")
     *                  ),
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="message", type="string", example="Unauthorized")
     *                  )
     *              }
     *          )
     *      )
     * )
     * 
     * @OA\Post(
     *      path="/api/register",
     *      summary="User Register",
     *      tags={"Authentication"},
     *      @OA\Parameter(
     *          name="tokenValidation",
     *          in="header",
     *          required=true,
     *          description="Put your given token on header tokenValidation. Ensure that 'email' are unique when registering a new user",
     *          @OA\Schema(
     *              type="string",
     *              example="5ljrZQkAxtHpEjKfTRKblN7IwFU9sSyO"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string", example="<unique-user>"),
     *              @OA\Property(property="email", type="string", example="<unique-email>@gmail.com"),
     *              @OA\Property(property="password", type="string", example="<password>")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Register Successful",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="string", example="Success"),
     *              @OA\Property(property="message", type="string", example="User registered successfully"),
     *              @OA\Property(property="data",
     *                  type="object",
     *                  @OA\Property(property="name", type="string", example="<your-unique-user>"),
     *                  @OA\Property(property="email", type="string", example="<your-unique-email>@gmail.com"),
     *                  @OA\Property(property="updated_at", type="string", example="2024-11-05T13:40:13.000000Z"),
     *                  @OA\Property(property="created_at", type="string", example="2024-11-05T13:40:13.000000Z"),
     *                  @OA\Property(property="id", type="string", example="<ID>"),
     *              ),
     *              @OA\Property(property="token", type="string", example="<RANDOM_INTEGER>|<RANDOM_TOKEN>")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized: Token invalid",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string", example="Unauthenticated")
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Error: email is invalid or email already been registered",
     *          @OA\JsonContent(
     *              oneOf={
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="status", type="string", example="Fail"),
     *                      @OA\Property(property="message", type="string", example="Registration failed"),
     *                      @OA\Property(property="error", type="string", example="The email has already been taken.")
     *                  ),
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="status", type="string", example="Fail"),
     *                      @OA\Property(property="message", type="string", example="Registration failed"),
     *                      @OA\Property(property="error", type="string", example="The email field must be a valid email address.")
     *                  )
     *              }
     *          )
     *      )
     * )
     * @OA\Post(
     *      path="/api/logout",
     *      summary="User Logout/sign-out",
     *      tags={"Authentication"},
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="tokenValidation",
     *          in="header",
     *          required=true,
     *          description="Put your given token on header tokenValidation",
     *          @OA\Schema(
     *              type="string",
     *              example="5ljrZQkAxtHpEjKfTRKblN7IwFU9sSyO"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Logout Successful",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="string", example="Success"),
     *              @OA\Property(property="message", type="string", example="Logout successful"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized: Token invalid, or user already logout.",
     *          @OA\JsonContent(
     *              oneOf={
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="status", type="string", example="Fail"),
     *                      @OA\Property(property="message", type="string", example="Unauthorized")
     *                  ),
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="status", type="string", example="Error"),
     *                      @OA\Property(property="message", type="string", example="You are not Authenticated")
     *                  ),
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="message", type="string", example="Unauthenticated")
     *                  )
     *              }
     *          )
     *      ),
     * ),
     * @OA\Get(
     *      path="/api/allchatrooms",
     *      summary="Show available chatrooms",
     *      tags={"Chatroom"},
     *      @OA\Parameter(
     *          name="tokenValidation",
     *          in="header",
     *          required=true,
     *          description="Put your given token on header tokenValidation",
     *          @OA\Schema(
     *              type="string",
     *              example="5ljrZQkAxtHpEjKfTRKblN7IwFU9sSyO"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Showing all the available chatrooms without authorization or authentication",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="string", example="Success"),
     *              @OA\Property(property="message", type="string", example="Fetched successfully"),
     *              @OA\Property(property="user", type="array", 
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="owner_id", type="integer", example=2),
     *                      @OA\Property(property="name", type="string", example="<CHATROOM_NAME>"),
     *                      @OA\Property(property="members", type="array", 
     *                          @OA\Items(
     *                              type="integer", example=2
     *                          ),
     *                          example={2, 3, 4, 1, 5}
     *                      ),
     *                      @OA\Property(property="max_members", type="integer", example=10),
     *                      @OA\Property(property="created_at", type="string", example="2024-11-05T13:40:13.000000Z"),
     *                      @OA\Property(property="updated_at", type="string", example="2024-11-05T13:40:13.000000Z")
     *                  ),
     *                  example={
     *                      {
     *                          "id" : 1,
     *                          "owner_id" : 2,
     *                          "name" : "chatroom-001",
     *                          "members" : {
     *                              1, 2, 3, 4, 5
     *                          },
     *                          "max_members" : 10,
     *                          "created_at" : "2024-11-05T13:40:13.000000Z",
     *                          "updated_at" : "2024-11-05T13:40:13.000000Z",
     *                      },
     *                      {
     *                          "id" : 2,
     *                          "owner_id" : 2,
     *                          "name" : "chatroom-001",
     *                          "members" : {
     *                              2, 5, 6
     *                          },
     *                          "max_members" : 3,
     *                          "created_at" : "2024-11-05T13:40:13.000000Z",
     *                          "updated_at" : "2024-11-05T13:40:13.000000Z",
     *                      }
     *                  }
     *              )
     *          )
     *      )
     * ),
     * @OA\Get(
     *      path="/api/listuser",
     *      summary="Show list user that also online",
     *      tags={"Chatroom"},
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="tokenValidation",
     *          in="header",
     *          required=true,
     *          description="Put your given token on header tokenValidation",
     *          @OA\Schema(
     *              type="string",
     *              example="5ljrZQkAxtHpEjKfTRKblN7IwFU9sSyO"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Show list other user success",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="string", example="Success"),
     *              @OA\Property(property="message", type="string", example="Fetch successfully."),
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="name", type="string", example="superadmin"),
     *                      @OA\Property(property="email", type="string", example="admin@gmail.com"),
     *                      @OA\Property(property="email_verified_at", type="string", nullable=true, example=null),
     *                      @OA\Property(property="created_at", type="string", example="2024-11-06T12:20:50.000000Z"),
     *                      @OA\Property(property="updated_at", type="string", example="2024-11-06T12:20:50.000000Z")
     *                  ),
     *                  example={
     *                      {
     *                          "id": 1,
     *                          "name": "newUser001",
     *                          "email": "newUser001@gmail.com",
     *                          "email_verified_at": null,
     *                          "created_at": "2024-11-06T12:20:50.000000Z",
     *                          "updated_at": "2024-11-06T12:20:50.000000Z"
     *                      },
     *                      {
     *                          "id": 3,
     *                          "name": "newUser002",
     *                          "email": "newUser002@gmail.com",
     *                          "email_verified_at": null,
     *                          "created_at": "2024-11-06T12:28:44.000000Z",
     *                          "updated_at": "2024-11-06T12:28:44.000000Z"
     *                      }
     *                  }
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized: Either the token is invalid, or user already logout.",
     *          @OA\JsonContent(
     *              oneOf={
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="status", type="string", example="Fail"),
     *                      @OA\Property(property="message", type="string", example="Unauthorized")
     *                  ),
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="status", type="string", example="Error"),
     *                      @OA\Property(property="message", type="string", example="You are not Authenticated")
     *                  ),
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="message", type="string", example="Unauthenticated")
     *                  )
     *              }
     *          )
     *      )
     * ),
     * @OA\Get(
     *      path="/api/chatrooms",
     *      summary="Show Chatroom available",
     *      tags={"Chatroom"},
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="tokenValidation", 
     *          in="header",
     *          required=true,
     *          description="Put your given token on header tokenValidation",
     *          @OA\Schema(
     *              type="string", 
     *              example="5ljrZQkAxtHpEjKfTRKblN7IwFU9sSyO"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Check again later for this path naming and functionality",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="string", example="Success"),
     *              @OA\Property(property="message", type="string", example="Fetched successfully"),
     *              @OA\Property(property="user", 
     *                  type="object",
     *                  @OA\Property(property="id", type="integer", example=2),
     *                  @OA\Property(property="name", type="string", example="dedaunan"),
     *                  @OA\Property(property="email", type="string", example="dedaunan@gmail.com"),
     *                  @OA\Property(property="email_verified_at", type="string", nullable=true, example=null),
     *                  @OA\Property(property="created_at", type="string", example="2024-11-05T13:40:13.000000Z"),
     *                  @OA\Property(property="updated_at", type="string", example="2024-11-05T13:40:13.000000Z"),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized: Either the token is invalid, or user already logout.",
     *          @OA\JsonContent(
     *              oneOf={
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="status", type="string", example="Fail"),
     *                      @OA\Property(property="message", type="string", example="Unauthorized")
     *                  ),
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="status", type="string", example="Error"),
     *                      @OA\Property(property="message", type="string", example="You are not Authenticated")
     *                  ),
     *                  @OA\Schema(
     *                      type="object",
     *                      @OA\Property(property="message", type="string", example="Unauthenticated")
     *                  )
     *              }
     *          )
     *      )
     * ),
     * @OA\Post(
     *      path="/api/chatrooms",
     *      summary="Create Chatrooms",
     *      tags={"Chatroom"},
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="tokenValidation",
     *          in="header",
     *          required=true,
     *          description="Put your given token on header tokenValidation",
     *          @OA\Schema(
     *              type="string",
     *              example="5ljrZQkAxtHpEjKfTRKblN7IwFU9sSyO"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string", example="<CHATROOM_NAME>"),
     *              @OA\Property(property="max_members", type="integer", example=5),
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Integer that shows on the chatroom.members is member who already joined the chatroom, for example your id is 20, then the chatroom.member [20] your id",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="string", example="Success"),
     *              @OA\Property(property="message", type="string", example="Chatroom created successfully"),
     *              @OA\Property(property="chatroom", 
     *                  type="object",
     *                  @OA\Property(property="owner_id", type="integer", example=2),
     *                  @OA\Property(property="name", type="string", example="<CHATROOM_NAME>"),
     *                  @OA\Property(property="members", type="array", 
     *                      @OA\Items(type="integer", example=2)
     *                  ),
     *                  @OA\Property(property="max_members", type="integer", example=5),
     *                  @OA\Property(property="updated_at", type="string", example="2024-11-05T13:40:13.000000Z"),
     *                  @OA\Property(property="created_at", type="string", example="2024-11-05T13:40:13.000000Z"),
     *                  @OA\Property(property="id", type="integer", example=2),
     *                  
     *              ),
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Failed to create chatroom, input field 'name' is required",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="string", example="Fail"),
     *              @OA\Property(property="message", type="string", example="Failed to create chatroom"),
     *              @OA\Property(property="error", type="string", example="The name field is required"),
     *          )
     *      )
     * ),
     * @OA\Post(
     *      path="/api/messages",
     *      summary="Send messages, include media",
     *      tags={"Message"},
     *      operationId="uploadImage",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="tokenValidation",
     *          in="header",
     *          required=true,
     *          description="Put your given token on header tokenValidation",
     *          @OA\Schema(
     *              type="string",
     *              example="5ljrZQkAxtHpEjKfTRKblN7IwFU9sSyO"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="attachment_url",
     *                      description="Image file to upload",
     *                      type="string", 
     *                      format="binary"
     *                  ),
     *                  @OA\Property(
     *                      property="chatroom_id",
     *                      description="Choose which chatroom_id you want to send message",
     *                      type="integer", 
     *                  ),
     *                  required={"attachment_url", "chatroom_id"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Image uploaded successfully",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", example="success"),
     *              @OA\Property(property="url", type="string", example="https://example.com/uploads/image.jpg")
     *          )
     *      ),
     * ),
     * @OA\Get(
     *      path="/api/messages/{chatroom_id}",
     *      summary="Go to Chatroom by route {chatroom_id}",
     *      tags={"Chatroom"},
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="tokenValidation",
     *          in="header",
     *          required=true,
     *          description="Put your given token on header tokenValidation",
     *          @OA\Schema(
     *              type="string",
     *              example="5ljrZQkAxtHpEjKfTRKblN7IwFU9sSyO"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Fetch chatroom data successfully",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="status", type="string", example="Success"),
     *              @OA\Property(property="message", type="string", example="Fetch successfully"),
     *              @OA\Property(property="data", type="array",
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="chatroom_id", type="integer", example=1),
     *                      @OA\Property(property="sender_id", 
     *                          type="object",
     *                          @OA\Property(property="id", type="integer", example=1),
     *                          @OA\Property(property="name", type="string", example="user001"),
     *                          @OA\Property(property="email", type="string", example="user001@gmail.com"),
     *                          @OA\Property(property="email_verified_at", type="string", nullable=true, example=null),
     *                          @OA\Property(property="created_at", type="string", example="2024-11-06T12:20:50.000000Z"),
     *                          @OA\Property(property="updated_at", type="string", example="2024-11-06T12:20:50.000000Z"),
     *                      ),
     *                      @OA\Property(property="message_text", type="string", nullable=true, example=null),
     *                      @OA\Property(property="attachment_url", type="string", nullable=true, example=null),
     *                      @OA\Property(property="created_at", type="string", example="2024-11-06T12:20:50.000000Z"),
     *                      @OA\Property(property="updated_at", type="string", example="2024-11-06T12:20:50.000000Z"),
     *                  )
     *              )
     *          )
     *      )
     * )
    */
    public function documentation()
    {
        return redirect('/api/documentation');
    }
}
