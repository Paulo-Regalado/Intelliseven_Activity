document.addEventListener("DOMContentLoaded", function () {
    var showMoreButton = document.getElementById("showMoreButton");
    var seeMoreDiv = document.getElementById("see_more");

    showMoreButton.addEventListener("click", function () {
        seeMoreDiv.classList.toggle("d-none");
    });

    var customedBtn = document.getElementById("customed_chat");
    var customedDiv = document.getElementById("customed_chat_option");

    customedBtn.addEventListener("click", function () {
        customedDiv.classList.toggle("d-none");
    });

    var chat_membersBtn = document.getElementById("chat_members");
    var chat_membersDiv = document.getElementById("chat_members_option");

    chat_membersBtn.addEventListener("click", function () {
        chat_membersDiv.classList.toggle("d-none");
    });

    var mediaBtn = document.getElementById("media");
    var mediaDiv = document.getElementById("media_option");

    mediaBtn.addEventListener("click", function () {
        mediaDiv.classList.toggle("d-none");
    });

    var privacyBtn = document.getElementById("privacy");
    var privacyDiv = document.getElementById("privacy_option");

    privacyBtn.addEventListener("click", function () {
        privacyDiv.classList.toggle("d-none");
    });


    // Function to fetch group names from the database
    function fetchGroupNames() {
        fetch('../home_chat/getGroupName.php')
            .then(response => response.json())
            .then(data => {

                // Check if there are any group names
                if (data.length > 0) {
                    // Set the first group name as the default
                    const defaultGroupName = data[0].group_name;
                    updateGroupName(defaultGroupName);
                    fetchGroupMessages(data[0].group_id);
                }
                // Loop through the data and update the HTML elements
                data.forEach(group => {
                    const groupName = group.group_name;


                    // Create a new div element
                    const newDiv = document.createElement('div');
                    newDiv.setAttribute('class', 'text-decoration-none text-dark');

                    // Update the inner HTML content dynamically
                    newDiv.innerHTML = `
                        <div class="inbox_mess d-flex mt-2">
                            <div class="img_container pt-2">
                                <img src="../resources/Ellipse 8.png" alt="" width="40" height="40">
                                <img class="secondary_pic" src="../resources/Ellipse 15.png" alt="" width="40" height="40">
                            </div>
                            <div class="ps-4">
                                <span class="name">${groupName}</span>
                                <p>Madel: Already change your schedule atty.</p>
                            </div>
                            <div class="ms-2">

                            <div class="active">
                                <div class="row">
                                    <div class="col">
                                        <i id="active_now" class="bi bi-dot ps-3"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col ps-3">
                                        <span id="seconds">1m</span>
                                    </div>
                                </div>
                            </div>

                            <div id="more" class="mt-3">
                                <button id="more_option" class="btn-sm rounded-circle border-0 bg-light"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>

                                <div id="more_menu_option" class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><button
                                            class="rounded-circle border-0 me-2"><i
                                                class="bi bi-check2-all"></i></button>Mark as read</a>
                                    <a class="dropdown-item" href="#"><button
                                            class="rounded-circle border-0 me-2"><i
                                                class="bi bi-bell-slash"></i></button>Mute as notifications</a>
                                    <a class="dropdown-item" href="#"><button
                                            class="rounded-circle border-0 me-2"><i
                                                class="bi bi-trash3"></i></button>Delete Chat</a>
                                    <a class="dropdown-item" href="#"><button
                                            class="rounded-circle border-0 me-2"><i
                                                class="bi bi-exclamation-octagon"></i></button>Report</a>
                                    <a class="dropdown-item" href="#"><button
                                            class="rounded-circle border-0 me-2"><i
                                                class="bi bi-box-arrow-right"></i></button>Leave group</a>

                                </div>
                            </div>
                        </div>
                        </div>
                    `;

                    // Append the new div to the parent element
                    document.getElementById('groupList').appendChild(newDiv);

                });

                // Add the event listener to the .inbox_mess div
                const inboxMessElements = document.querySelectorAll('.inbox_mess');
                inboxMessElements.forEach((element, index) => {
                    element.addEventListener('click', () => {
                        updateGroupName(data[index].group_name);
                        updateGroupName(data[index].group_name);
                        fetchGroupMessages(data[index].group_id);
                    });
                });


            })
            .catch(error => console.error('Error fetching group names:', error));
    }

    // Function to update the group name in the message section
    function updateGroupName(groupName) {
        document.getElementById('groupNamePlaceholder').textContent = groupName;
        document.getElementById('seeMorePlaceHolder').textContent = groupName;

    }


    // Function to fetch group messages from the database based on group_id
    function fetchGroupMessages(groupchatID) {
        let formData = new FormData();
        formData.append('group_id', groupchatID);

        fetch('../home_chat/getGroupMessages.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(messages => {
                console.log('Group Messages:', messages);

                // Clear previous messages in the container
                const messageContainer = document.getElementById('messageContainer');
                messageContainer.innerHTML = '';

                // Loop through the messages and create HTML elements for each
                messages.forEach(message => {
                    const messageDiv = createMessageElement(message);
                    messageContainer.appendChild(messageDiv);
                });
            })
            .catch(error => console.error('Error fetching group messages:', error));
    }


    // Function to create a message element based on the provided message object
    function createMessageElement(message) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('row', 'mb-3');

        messageDiv.innerHTML = `
        <div>
            <div class="d-flex">
                <div>
                    <img src="../resources/Ellipse 12.png" alt="" width="39px" height="39px">
                </div>
                <div class="d-flex flex-column ms-2">
                    <span class="person_name ms-2">Madel</span>
                    <span id="received_message" class="received_message p-2">${message.message}</span>
                </div>
            </div>
        </div>
    `;

        return messageDiv;
    }

    // function updateReceivedMessages(receivedMessage) {
    //     document.getElementById('received_message').textContent = receivedMessage;
    // }

    // function updateSentMessages(sentMessage) {
    //     document.getElementById('sent_message').textContent = sentMessage;
    // }


    // Call the fetchGroupNames function when the page loads
    fetchGroupNames();

});