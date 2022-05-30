    <!-- =============== New Chat Mobile =============== -->
    <div
      class="modal fade"
      id="newChat"
      tabindex="-1"
      aria-labelledby="newChatLabel"
      aria-hidden="true"
      data-bs-backdrop="false"
    >
      <div
        class="
          modal-dialog modal-sm
          position-absolute
          bottom-0
          end-0
          w-75
          shadow
        "
        style="transform: translateX(-80px)"
      >
        <div class="modal-content border-0">
          <!-- head -->
          <div class="modal-header align-items-start">
            <div>
              <h6 class="modal-title text-dark mb-2" id="newChat1Label">
                New Message
              </h6>
              <label class="text-dark">To:</label>
              <input type="text" class="border-0" />
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <!-- body -->
          <div class="modal-body shadow m-0 chat-border">
            <p class="m-0 text-primary ms-4">Suggested</p>
          </div>
          <!-- footer -->
          <div class="modal-footer border-0" style="min-height: 300px"></div>
        </div>
      </div>
    </div>
    <!-- ================= Chat Modal Mobile ================= -->
    <!-- chat 1 -->
    <div
      class="modal fade"
      id="singleChat1"
      tabindex="-1"
      aria-labelledby="singleChat1Label"
      aria-hidden="true"
      data-bs-backdrop="false"
    >
      <div
        class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-17"
        style="transform: translateX(-80px)"
      >
        <div class="modal-content border-0 shadow">
          <!-- head -->
          <div class="modal-header">
            <div
              class="dropdown-item d-flex rounded"
              type="button"
              data-bs-container="body"
              data-bs-toggle="popover"
              data-bs-placement="left"
              data-bs-content='
              <div>
                <div class="popover-body d-flex flex-column p-0">
                  <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                    <i class="far fa-comment me-3 fs-4"></i>
                    <p class="m-0">Open Messenger App</p>
                  </div>
                  <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                    <i class="far fa-user me-3 fs-4"></i>
                    <p class="m-0">Open Messenger App</p>
                  </div>
                  <hr>
                  <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                    <i class="fas fa-fill-drip me-3 fs-4"></i>
                    <p class="m-0">Color</p>
                  </div>
                  <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                    <i class="far fa-smile-beam me-3 fs-4"></i>
                    <p class="m-0">Emoji</p>
                  </div>
                  <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                    <i class="fas fa-pencil-alt me-3 fs-4"></i>
                    <p class="m-0">Nicknames</p>
                  </div>
                </div>
              </div>
              '
              data-bs-html="true"
            >
              <!-- avatar -->
              <div class="position-relative">
                <img
                  src="https://source.unsplash.com/random/1"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 38px; height: 38px; object-fit: cover"
                />
                <span
                  class="
                    position-absolute
                    bottom-0
                    translate-middle
                    p-1
                    bg-success
                    border border-light
                    rounded-circle
                  "
                  style="left: 75%"
                >
                  <span class="visually-hidden">New alerts</span>
                </span>
              </div>
              <!-- name -->
              <div>
                <p class="m-0">Mike <i class="fas fa-angle-down"></i></p>
                <span class="text-muted fs-7">Active Now</span>
              </div>
            </div>
            <!-- close -->
            <i class="fas fa-video mx-2 text-muted pointer"></i>
            <i class="fas fa-phone-alt mx-2 text-muted pointer"></i>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <!-- body -->
          <div class="modal-body p-0 overflow-auto" style="max-height: 300px">
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/1"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/1"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/1"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
          </div>
          <!-- message input -->
          <div class="modal-footer p-0 m-0 border-0">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <i class="fas fa-plus-circle mx-1 fs-5 text-muted pointer"></i>
                <i class="far fa-file-image mx-1 fs-5 text-muted pointer"></i>
                <i class="fas fa-portrait mx-1 fs-5 text-muted pointer"></i>
                <i class="fas fa-adjust mx-1 fs-5 text-muted pointer"></i>
              </div>
              <div>
                <input
                  type="text"
                  class="form-control rounded-pill border-0 bg-gray"
                  placeholder="Aa"
                />
              </div>
              <div class="d-flex align-items-center mx-2">
                <i class="fas fa-thumbs-up fs-5 text-muted pointer"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- chat 2 -->
    <div
      class="modal fade"
      id="singleChat2"
      tabindex="-1"
      aria-labelledby="singleChat2Label"
      aria-hidden="true"
      data-bs-backdrop="false"
    >
      <div
        class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-17"
        style="transform: translateX(-80px)"
      >
        <div class="modal-content border-0 shadow">
          <!-- head -->
          <div class="modal-header">
            <div
              class="dropdown-item d-flex rounded"
              type="button"
              data-bs-container="body"
              data-bs-toggle="popover"
              data-bs-placement="left"
              data-bs-content='
                <div>
                  <div class="popover-body d-flex flex-column p-0">
                    <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                      <i class="far fa-comment me-3 fs-4"></i>
                      <p class="m-0">Open Messenger App</p>
                    </div>
                    <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                      <i class="far fa-user me-3 fs-4"></i>
                      <p class="m-0">Open Messenger App</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                      <i class="fas fa-fill-drip me-3 fs-4"></i>
                      <p class="m-0">Color</p>
                    </div>
                    <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                      <i class="far fa-smile-beam me-3 fs-4"></i>
                      <p class="m-0">Emoji</p>
                    </div>
                    <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                      <i class="fas fa-pencil-alt me-3 fs-4"></i>
                      <p class="m-0">Nicknames</p>
                    </div>
                  </div>
                </div>
                '
              data-bs-html="true"
            >
              <!-- avatar -->
              <div class="position-relative">
                <img
                  src="https://source.unsplash.com/random/2"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 38px; height: 38px; object-fit: cover"
                />
                <span
                  class="
                    position-absolute
                    bottom-0
                    translate-middle
                    p-1
                    bg-success
                    border border-light
                    rounded-circle
                  "
                  style="left: 75%"
                >
                  <span class="visually-hidden">New alerts</span>
                </span>
              </div>
              <!-- name -->
              <div>
                <p class="m-0">Tuan <i class="fas fa-angle-down"></i></p>
                <span class="text-muted fs-7">Active Now</span>
              </div>
            </div>
            <!-- close -->
            <i class="fas fa-video mx-2 text-muted pointer"></i>
            <i class="fas fa-phone-alt mx-2 text-muted pointer"></i>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <!-- body -->
          <div class="modal-body p-0 overflow-auto" style="max-height: 300px">
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/2"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/2"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/2"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
          </div>
          <!-- message input -->
          <div class="modal-footer p-0 m-0 border-0">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <i class="fas fa-plus-circle mx-1 fs-5 text-muted pointer"></i>
                <i class="far fa-file-image mx-1 fs-5 text-muted pointer"></i>
                <i class="fas fa-portrait mx-1 fs-5 text-muted pointer"></i>
                <i class="fas fa-adjust mx-1 fs-5 text-muted pointer"></i>
              </div>
              <div>
                <input
                  type="text"
                  class="form-control rounded-pill border-0 bg-gray"
                  placeholder="Aa"
                />
              </div>
              <div class="d-flex align-items-center mx-2">
                <i class="fas fa-thumbs-up fs-5 text-muted pointer"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- chat 3 -->
    <div
      class="modal fade"
      id="singleChat3"
      tabindex="-1"
      aria-labelledby="singleChat3Label"
      aria-hidden="true"
      data-bs-backdrop="false"
    >
      <div
        class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-17"
        style="transform: translateX(-80px)"
      >
        <div class="modal-content border-0 shadow">
          <!-- head -->
          <div class="modal-header">
            <div
              class="dropdown-item d-flex rounded"
              type="button"
              data-bs-container="body"
              data-bs-toggle="popover"
              data-bs-placement="left"
              data-bs-content='
                    <div>
                      <div class="popover-body d-flex flex-column p-0">
                        <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                          <i class="far fa-comment me-3 fs-4"></i>
                          <p class="m-0">Open Messenger App</p>
                        </div>
                        <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                          <i class="far fa-user me-3 fs-4"></i>
                          <p class="m-0">Open Messenger App</p>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                          <i class="fas fa-fill-drip me-3 fs-4"></i>
                          <p class="m-0">Color</p>
                        </div>
                        <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                          <i class="far fa-smile-beam me-3 fs-4"></i>
                          <p class="m-0">Emoji</p>
                        </div>
                        <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                          <i class="fas fa-pencil-alt me-3 fs-4"></i>
                          <p class="m-0">Nicknames</p>
                        </div>
                      </div>
                    </div>
                    '
              data-bs-html="true"
            >
              <!-- avatar -->
              <div class="position-relative">
                <img
                  src="https://source.unsplash.com/random/2"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 38px; height: 38px; object-fit: cover"
                />
                <span
                  class="
                    position-absolute
                    bottom-0
                    translate-middle
                    p-1
                    bg-success
                    border border-light
                    rounded-circle
                  "
                  style="left: 75%"
                >
                  <span class="visually-hidden">New alerts</span>
                </span>
              </div>
              <!-- name -->
              <div>
                <p class="m-0">Jerry <i class="fas fa-angle-down"></i></p>
                <span class="text-muted fs-7">Active Now</span>
              </div>
            </div>
            <!-- close -->
            <i class="fas fa-video mx-2 text-muted pointer"></i>
            <i class="fas fa-phone-alt mx-2 text-muted pointer"></i>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <!-- body -->
          <div class="modal-body p-0 overflow-auto" style="max-height: 300px">
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/3"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/3"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/3"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
          </div>
          <!-- message input -->
          <div class="modal-footer p-0 m-0 border-0">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <i class="fas fa-plus-circle mx-1 fs-5 text-muted pointer"></i>
                <i class="far fa-file-image mx-1 fs-5 text-muted pointer"></i>
                <i class="fas fa-portrait mx-1 fs-5 text-muted pointer"></i>
                <i class="fas fa-adjust mx-1 fs-5 text-muted pointer"></i>
              </div>
              <div>
                <input
                  type="text"
                  class="form-control rounded-pill border-0 bg-gray"
                  placeholder="Aa"
                />
              </div>
              <div class="d-flex align-items-center mx-2">
                <i class="fas fa-thumbs-up fs-5 text-muted pointer"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- chat 4 -->
    <div
      class="modal fade"
      id="singleChat4"
      tabindex="-1"
      aria-labelledby="singleChat4Label"
      aria-hidden="true"
      data-bs-backdrop="false"
    >
      <div
        class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-17"
        style="transform: translateX(-80px)"
      >
        <div class="modal-content border-0 shadow">
          <!-- head -->
          <div class="modal-header">
            <div
              class="dropdown-item d-flex rounded"
              type="button"
              data-bs-container="body"
              data-bs-toggle="popover"
              data-bs-placement="left"
              data-bs-content='
                      <div>
                        <div class="popover-body d-flex flex-column p-0">
                          <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                            <i class="far fa-comment me-3 fs-4"></i>
                            <p class="m-0">Open Messenger App</p>
                          </div>
                          <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                            <i class="far fa-user me-3 fs-4"></i>
                            <p class="m-0">Open Messenger App</p>
                          </div>
                          <hr>
                          <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                            <i class="fas fa-fill-drip me-3 fs-4"></i>
                            <p class="m-0">Color</p>
                          </div>
                          <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                            <i class="far fa-smile-beam me-3 fs-4"></i>
                            <p class="m-0">Emoji</p>
                          </div>
                          <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                            <i class="fas fa-pencil-alt me-3 fs-4"></i>
                            <p class="m-0">Nicknames</p>
                          </div>
                        </div>
                      </div>
                      '
              data-bs-html="true"
            >
              <!-- avatar -->
              <div class="position-relative">
                <img
                  src="https://source.unsplash.com/random/2"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 38px; height: 38px; object-fit: cover"
                />
                <span
                  class="
                    position-absolute
                    bottom-0
                    translate-middle
                    p-1
                    bg-success
                    border border-light
                    rounded-circle
                  "
                  style="left: 75%"
                >
                  <span class="visually-hidden">New alerts</span>
                </span>
              </div>
              <!-- name -->
              <div>
                <p class="m-0">Tony <i class="fas fa-angle-down"></i></p>
                <span class="text-muted fs-7">Active Now</span>
              </div>
            </div>
            <!-- close -->
            <i class="fas fa-video mx-2 text-muted pointer"></i>
            <i class="fas fa-phone-alt mx-2 text-muted pointer"></i>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <!-- body -->
          <div class="modal-body p-0 overflow-auto" style="max-height: 300px">
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/4"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/4"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/4"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
          </div>
          <!-- message input -->
          <div class="modal-footer p-0 m-0 border-0">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <i class="fas fa-plus-circle mx-1 fs-5 text-muted pointer"></i>
                <i class="far fa-file-image mx-1 fs-5 text-muted pointer"></i>
                <i class="fas fa-portrait mx-1 fs-5 text-muted pointer"></i>
                <i class="fas fa-adjust mx-1 fs-5 text-muted pointer"></i>
              </div>
              <div>
                <input
                  type="text"
                  class="form-control rounded-pill border-0 bg-gray"
                  placeholder="Aa"
                />
              </div>
              <div class="d-flex align-items-center mx-2">
                <i class="fas fa-thumbs-up fs-5 text-muted pointer"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- chat 5 -->
    <div
      class="modal fade"
      id="singleChat5"
      tabindex="-1"
      aria-labelledby="singleChat5Label"
      aria-hidden="true"
      data-bs-backdrop="false"
    >
      <div
        class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-17"
        style="transform: translateX(-80px)"
      >
        <div class="modal-content border-0 shadow">
          <!-- head -->
          <div class="modal-header">
            <div
              class="dropdown-item d-flex rounded"
              type="button"
              data-bs-container="body"
              data-bs-toggle="popover"
              data-bs-placement="left"
              data-bs-content='
                          <div>
                            <div class="popover-body d-flex flex-column p-0">
                              <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                                <i class="far fa-comment me-3 fs-4"></i>
                                <p class="m-0">Open Messenger App</p>
                              </div>
                              <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                                <i class="far fa-user me-3 fs-4"></i>
                                <p class="m-0">Open Messenger App</p>
                              </div>
                              <hr>
                              <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                                <i class="fas fa-fill-drip me-3 fs-4"></i>
                                <p class="m-0">Color</p>
                              </div>
                              <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                                <i class="far fa-smile-beam me-3 fs-4"></i>
                                <p class="m-0">Emoji</p>
                              </div>
                              <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                                <i class="fas fa-pencil-alt me-3 fs-4"></i>
                                <p class="m-0">Nicknames</p>
                              </div>
                            </div>
                          </div>
                          '
              data-bs-html="true"
            >
              <!-- avatar -->
              <div class="position-relative">
                <img
                  src="https://source.unsplash.com/random/2"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 38px; height: 38px; object-fit: cover"
                />
                <span
                  class="
                    position-absolute
                    bottom-0
                    translate-middle
                    p-1
                    bg-success
                    border border-light
                    rounded-circle
                  "
                  style="left: 75%"
                >
                  <span class="visually-hidden">New alerts</span>
                </span>
              </div>
              <!-- name -->
              <div>
                <p class="m-0">Phu <i class="fas fa-angle-down"></i></p>
                <span class="text-muted fs-7">Active Now</span>
              </div>
            </div>
            <!-- close -->
            <i class="fas fa-video mx-2 text-muted pointer"></i>
            <i class="fas fa-phone-alt mx-2 text-muted pointer"></i>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <!-- body -->
          <div class="modal-body p-0 overflow-auto" style="max-height: 300px">
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/5"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/5"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
            <!-- message l -->
            <li class="list-group-item border-0 d-flex">
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/random/5"
                  alt="avatar"
                  class="rounded-circle me-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
            </li>
            <!-- message r -->
            <li class="list-group-item border-0 d-flex justify-content-end">
              <!-- message -->
              <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
              <!-- avatar -->
              <div>
                <img
                  src="https://source.unsplash.com/collection/happy-people"
                  alt="avatar"
                  class="rounded-circle ms-2"
                  style="width: 28px; height: 28px; object-fit: cover"
                />
              </div>
            </li>
          </div>
          <!-- message input -->
          <div class="modal-footer p-0 m-0 border-0">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <i class="fas fa-plus-circle mx-1 fs-5 text-muted pointer"></i>
                <i class="far fa-file-image mx-1 fs-5 text-muted pointer"></i>
                <i class="fas fa-portrait mx-1 fs-5 text-muted pointer"></i>
                <i class="fas fa-adjust mx-1 fs-5 text-muted pointer"></i>
              </div>
              <div>
                <input
                  type="text"
                  class="form-control rounded-pill border-0 bg-gray"
                  placeholder="Aa"
                />
              </div>
              <div class="d-flex align-items-center mx-2">
                <i class="fas fa-thumbs-up fs-5 text-muted pointer"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>