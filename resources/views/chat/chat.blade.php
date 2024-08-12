@include('frontend.layouts.header_links')
@include('frontend.layouts.header')

<div class="wrapper" style="background-color: #f5f6fa; color: #333;"> <!-- Updated background color to a lighter shade -->
    <div class="container-fluid" style="display: flex; padding: 0; height: 100vh;">

        <!-- Sidebar -->
        <div class="sidebar" style="background-color: #242631; width: 25%; max-width: 300px; padding: 20px;">
            <!-- Search Field -->
            <div class="sidebar-search" style="margin-bottom: 20px;">
                <input type="text" placeholder="Search..." style="width: 100%; padding: 10px; border: none; border-radius: 10px; background-color: #383a45; color: #fff;">
            </div>
            <!-- Sidebar Header -->
            <div class="sidebar-header" style="padding: 10px 0; text-align: center;">
                <h2 style="color: #fff; font-size: 24px;">Chat</h2>
            </div>
            <!-- User List -->
            <div class="user-list" style="margin-top: 20px;">
                <!-- Example of user list item -->
                <div class="user-item" style="display: flex; align-items: center; margin-bottom: 10px; padding: 10px; background-color: #333542; border-radius: 10px;">
                    <div class="user-avatar" style="width: 40px; height: 40px; background-color: #4b4d59; border-radius: 50%; margin-right: 10px;"></div>
                    <div class="user-info" style="flex-grow: 1;">
                        <p style="margin: 0; color: #fff;">John Doe</p> <!-- Changed user name -->
                        <p style="margin: 0; color: #bbb; font-size: 12px;">Last message preview</p>
                    </div>
                </div>
                <!-- Repeat user-item for each user -->
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="chat-area" style="flex-grow: 1; background-color: #e4e5ea; padding: 20px;"> <!-- Updated background color to a lighter shade -->
            <div class="chat-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="margin: 0; color: #333;">Jane Smith</h3> <!-- Changed user name -->
                <div class="chat-options">
                    <span style="margin-right: 10px;">📞</span>
                    <span>📷</span>
                </div>
            </div>
            <div class="chat-messages" style="overflow-y: auto; height: calc(100% - 100px);">
                <!-- Example of a received message -->
                <div class="message received" style="margin-bottom: 10px;">
                    <div class="message-content" style="display: inline-block; padding: 10px; border-radius: 10px; background-color: #d1d1d1; color: #333;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>
                    <p style="margin: 5px 0 0; color: #888; font-size: 12px;">22:01</p>
                </div>
                <!-- Example of a sent message -->
                <div class="message sent" style="margin-bottom: 10px; text-align: right;">
                    <div class="message-content" style="display: inline-block; padding: 10px; border-radius: 10px; background-color: #007bff; color: #fff;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </div>
                    <p style="margin: 5px 0 0; color: #888; font-size: 12px;">22:02</p>
                </div>
                <!-- Repeat message for each chat message -->
            </div>
            <div class="chat-input" style="margin-top: 20px; display: flex;">
                <input type="text" placeholder="Type a message" style="flex-grow: 1; padding: 10px; border: none; border-radius: 10px; background-color: #fff; color: #333; margin-right: 10px;">
                <button style="background-color: #007bff; color: #fff; border: none; border-radius: 10px; padding: 10px;">Send</button>
            </div>
        </div>
    </div>
</div>

@include('frontend.layouts.footer')
@include('frontend.layouts.footer_links')
