<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/home_chat.css">
    <title>Home Chat</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-sm-auto border sticky-top d-flex">
                <div class="d-flex flex-sm-column flex-row flex-nowrap align-items-center sticky-top">
                    <a href="/" class="d-block pt-2">
                        <img src="../resources/IntelliSeven_Logo 1.png" alt="" width="62" height="41">
                    </a>
                    <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link py-3 px-2">
                                <img src="../resources/bxs_message.png" alt="" width="40" height="40">
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link py-3 px-2">
                                <img src="../resources/material-symbols_group.png" alt="" width="40" height="40">
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link py-3 px-2">
                                <img src="../resources/tabler_map-pin-filled.png" alt="" width="40" height="40">
                            </a>
                        </li>
                    </ul>
                    <div class="profile mt-auto mb-3 d-flex align-items-end">
                        <a href=""><img src="../resources/Ellipse 7.png" alt=""></a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->

            <!-- Chat List -->
            <div id="chats" class="col-3 border p-3 d-flex flex-column">
                <div class="d-flex justify-content-between w-100">
                    <h3>Chats</h3>
                    <a href="" class=""><img src="../resources/add.png" alt="" width="30" height="30"></a>
                </div>

                <div class="form-floating mb-2">
                    <input class="form-control form-control-sm rounded-pill" type="text" id="floatingInput"
                        placeholder=".form-control-sm">
                    <label for="floatingInput"><i class="bi bi-search me-1"></i>Search message</label>
                </div>


                <div class="inbox_content">

                    <div href="#" class="text-decoration-none text-dark">

                        <div id="groupList"></div>

                    </div>

                </div>
            </div>
            <!-- Chat List -->

            <!-- Message -->
            <div class="col-sm px d-flex flex-column">

                <div id="message" class="row border">
                    <div class="col d-flex pt-1">
                        <div class="d-flex align-items-center w-100">
                            <div class="img_wrapper d-flex">
                                <img src="../resources/Ellipse 8.png" alt="" width="40" height="40">
                                <img id="header_img" src="../resources/Ellipse 8.png" alt="" width="40" height="40">

                            </div>
                            <div>
                                <span id="groupNamePlaceholder" class="name"></span>
                            </div>

                            <div class="ms-auto">
                                <i class="bi bi-plus-circle me-2"></i>
                                <a href="#" id="showMoreButton" class="text-decoration-none text-dark"><i
                                        class="bi bi-three-dots"></i></a>
                            </div>
                        </div>

                    </div>
                </div>



                <div id="content" class="row p-2">
                    <div class="col">
                        <div class="row">
                            <div class="col text-center">
                                <span id="date"></span>
                            </div>
                        </div>

                        <!-- Container for both received and sent messages -->
                        <div id="messageContainer" class="w-100 mb-3"></div>
                    </div>
                </div>
                <!-- Message Content -->

                <div id="message" class="row border">
                    <div class="col d-flex align-items-center">
                        <i class="bi bi-plus-circle-fill pe-2 text-secondary"></i>
                        <input type="text" name="new_message" id="new_message"
                            class="rounded-pill border-1 border-light w-100">
                        <button id="sendButton" class="btn p-0"><i class="bi bi-send px-2 text-secondary"></i></button>
                    </div>
                </div>


                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Chat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                Once you delete your copy of this conversation, it cannot be undone.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    id="cancelButton">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Delete Modal -->



            </div>
            <!-- Message -->

            <!-- See More -->
            <div id="see_more" class="col-3 border p-3 d-flex flex-column">

                <div class="p-1 mt-4 text-center">
                    <img src="../resources/Ellipse 8.png" alt="" width="70px" height="70px">
                    <img src="../resources/Ellipse 15.png" class="group_photo" alt="" width="70px" height="70px">
                    <h5 id="seeMorePlaceHolder" class="mt-3"></h5>
                </div>

                <div class="icons text-center mb-2">

                    <button class="rounded-circle border-0 me-2"><i class="bi bi-bell-slash"></i></button>
                    <button class="rounded-circle border-0"><i class="bi bi-search"></i></button>

                </div>

                <div class="dropwdown">
                    <button id="customed_chat" class="btn dropdown-toggle w-100" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Customize Chat
                    </button>

                    <div id="customed_chat_option" class="dropdown-menu-right w-100 d-none"
                        aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#"><button class="rounded-circle border-0 me-2"><i
                                    class="bi bi-pencil"></i></button>Change chat name</a>
                        <a class="dropdown-item" href="#"><button class="rounded-circle border-0 me-2"><i
                                    class="bi bi-image"></i></button>Change photo</a>
                        <a class="dropdown-item" href="#"><button class="rounded-circle border-0 me-2"><i
                                    class="bi bi-alphabet"></i></button>Edit nicknames</a>
                        <a class="dropdown-item" href="#"><button class="rounded-circle border-0 me-2"><i
                                    class="bi bi-search"></i></button>Search in conversations</a>

                    </div>

                    <button id="chat_members" class="btn dropdown-toggle w-100" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Chat Members
                    </button>
                    <div id="chat_members_option" class="dropdown-menu-right w-100 d-none"
                        aria-labelledby="dropdownMenuButton">

                        <a class="dropdown-item">
                            <div class="row">
                                <div class="col-2">
                                    <img src="../resources/Ellipse 13.png" class="rounded-circle me-2" alt="">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <span class="name">Joshua Martins</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <span class="sub_text">Associate Atty. Martins</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 pt-2">
                                    <button class="btn-sm rounded-circle border-0 bg-light" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                </div>

                            </div>
                        </a>

                        <a class="dropdown-item">
                            <div class="row">
                                <div class="col-2">
                                    <img src="../resources/Ellipse 17.png" class="rounded-circle me-2" alt="">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <span class="name">Marvin Malsada</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <span class="sub_text">Associate Atty.Marvin</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 pt-2">
                                    <button class="btn-sm rounded-circle border-0 bg-light" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                </div>

                            </div>
                        </a>


                        <a class="dropdown-item">
                            <div class="row">
                                <div class="col-2">
                                    <img src="../resources/Ellipse 16.png" class="rounded-circle me-2" alt="">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <span class="name">Raphael Sy</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <span class="sub_text">Legal Atty. Raphael</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 pt-2">
                                    <button class="btn-sm rounded-circle border-0 bg-light" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                </div>

                            </div>
                        </a>


                        <!-- <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" href="#"><img src="../resources/Ellipse 17.png"
                                class="rounded-circle me-2" alt="">Marvin Malsada <span
                                class="sub_title text-secondary">Associate
                                Atty.
                                Martins</span></a>
                        <a class="dropdown-item" href="#"><img src="../resources/Ellipse 16.png"
                                class="rounded-circle me-2" alt="">Raphael Sy <span
                                class="sub_title text-secondary">Associate
                                Atty.
                                Martins</span></a> -->

                    </div>

                    <button id="media" class="btn dropdown-toggle w-100" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Media and Files
                    </button>
                    <div id="media_option" class="dropdown-menu-right w-100 d-none"
                        aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#"><button class="rounded-circle border-0 me-2"><i
                                    class="bi bi-paperclip"></i></button>Attachment</a>
                        <a class="dropdown-item" href="#"><button class="rounded-circle border-0 me-2"><i
                                    class="bi bi-image"></i></button>Media</a>
                    </div>

                    <button id="privacy" class="btn dropdown-toggle w-100" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Privacy & Support
                    </button>
                    <div id="privacy_option" class="dropdown-menu-right w-100 d-none"
                        aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#"><button class="rounded-circle border-0 me-2"><i
                                    class="bi bi-bell"></i></button>Unmute notifications</a>
                        <a class="dropdown-item" href="#"><button class="rounded-circle border-0 me-2"><i
                                    class="bi bi-exclamation-triangle"></i></button>Report</a>
                        <a class="dropdown-item" href="#"><button class="rounded-circle border-0 me-2"><i
                                    class="bi bi-box-arrow-right"></i></button>Leave group</a>
                    </div>



                </div>

            </div>
            <!-- See More -->

        </div>
    </div>
    <div id="grad1"></div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="../home_chat/home_chat.js"></script>

    <script>
        document.getElementById('cancelButton').addEventListener('click', function () {
            $('#deleteModal').modal('hide');

        });
    </script>

</body>

</html>