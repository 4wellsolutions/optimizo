{{-- resources/views/admin/partials/media-library-modal.blade.php --}}
<div x-data="mediaLibrary()" x-show="isOpen" @open-media-modal.window="openModal($event.detail)"
    class="media-modal-backdrop" style="display: none;">

    <!-- Modal Panel -->
    <div class="media-modal-content bg-white shadow-lg rounded overflow-hidden d-flex flex-column">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
            <h5 class="m-0 font-weight-bold">Media Library</h5>
            <button @click="closeModal()" class="btn btn-sm btn-light text-muted">
                <i class="fas fa-times fa-lg"></i>
            </button>
        </div>

        <!-- Custom Tabs -->
        <div class="d-flex border-bottom bg-light">
            <button @click="switchTab('upload')"
                class="btn btn-link text-decoration-none px-4 py-3 font-weight-bold rounded-0 border-bottom-active"
                :class="activeTab === 'upload' ? 'text-primary border-primary bg-white' : 'text-muted border-transparent'">
                Upload Files
            </button>
            <button @click="switchTab('library')"
                class="btn btn-link text-decoration-none px-4 py-3 font-weight-bold rounded-0 border-bottom-active"
                :class="activeTab === 'library' ? 'text-primary border-primary bg-white' : 'text-muted border-transparent'">
                Media Library
            </button>
        </div>

        <!-- Content Area -->
        <div class="flex-grow-1 position-relative overflow-hidden">

            <!-- Upload Tab -->
            <div x-show="activeTab === 'upload'"
                class="h-100 d-flex flex-column align-items-center justify-content-center p-5">
                <div class="upload-zone border-dashed rounded p-5 text-center w-100" style="max-width: 500px;"
                    @dragover.prevent="dragover = true" @dragleave.prevent="dragover = false"
                    @drop.prevent="handleDrop($event)"
                    :class="dragover ? 'bg-light-blue border-primary' : 'bg-light border-secondary'">

                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>

                    <h5 class="text-dark">Drag & Drop files here</h5>
                    <p class="text-muted small mb-3">or</p>

                    <label class="btn btn-primary btn-lg cursor-pointer m-0">
                        Select Files
                        <input type="file" class="d-none" multiple accept="image/*"
                            @change="handleFiles($event.target.files)">
                    </label>
                </div>

                <!-- Progress Bar -->
                <div x-show="isUploading" class="w-100 mt-4" style="max-width: 500px;">
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-primary" role="progressbar"
                            :style="'width: ' + uploadProgress + '%'"></div>
                    </div>
                    <p class="text-center text-muted small mt-2" x-text="'Uploading... ' + uploadProgress + '%'"></p>
                </div>
            </div>

            <!-- Library Tab -->
            <div x-show="activeTab === 'library'" class="h-100 d-flex">
                <!-- Grid -->
                <div class="flex-grow-1 overflow-auto p-3" @scroll="handleScroll">
                    <div class="row no-gutters">
                        <template x-for="item in mediaItems" :key="item.id">
                            <div class="col-6 col-md-3 col-lg-2 p-1">
                                <div @click="selectItem(item)"
                                    class="media-item position-relative rounded overflow-hidden border"
                                    :class="selectedItem?.id === item.id ? 'border-primary shadow-sm' : 'border-light'">

                                    <div class="ratio-box">
                                        <img :src="item.url" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                    </div>

                                    <!-- Selected Checkmark -->
                                    <div x-show="selectedItem?.id === item.id"
                                        class="position-absolute bg-primary text-white rounded-circle d-flex align-items-center justify-content-center checkmark-badge">
                                        <i class="fas fa-check fa-xs"></i>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Infinite Scroll Loading -->
                    <div x-show="isLoading" class="text-center py-3">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    <!-- Empty State -->
                    <div x-show="!isLoading && mediaItems.length === 0"
                        class="d-flex flex-column align-items-center justify-content-center h-100 text-muted">
                        <i class="far fa-images fa-3x mb-3 text-light-gray"></i>
                        <p>No media found.</p>
                    </div>
                </div>

                <!-- Sidebar (Details) -->
                <div x-show="selectedItem" class="bg-light border-left p-3 overflow-auto"
                    style="width: 300px; min-width: 300px;">
                    <h6 class="font-weight-bold text-dark mb-3">Attachment Details</h6>

                    <div class="bg-white border rounded p-2 mb-3 d-flex align-items-center justify-content-center"
                        style="height: 200px;">
                        <img :src="selectedItem?.url" class="img-fluid" style="max-height: 100%; max-width: 100%;">
                    </div>

                    <div class="mb-3">
                        <strong class="d-block text-xs text-muted text-uppercase">File Name</strong>
                        <span class="d-block text-break small" x-text="selectedItem?.original_name"></span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block text-xs text-muted text-uppercase">Type</strong>
                        <span class="d-block small" x-text="selectedItem?.mime_type"></span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block text-xs text-muted text-uppercase">Size</strong>
                        <span class="d-block small" x-text="formatBytes(selectedItem?.size)"></span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block text-xs text-muted text-uppercase">Uploaded</strong>
                        <span class="d-block small"
                            x-text="new Date(selectedItem?.created_at).toLocaleDateString()"></span>
                    </div>

                    <div class="border-top pt-3 mt-3">
                        <a :href="selectedItem?.url" target="_blank" class="text-primary small d-block mb-2">View
                            URL</a>
                        <button @click="deleteItem()" class="btn btn-sm btn-outline-danger btn-block">Delete
                            Permanently</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="p-3 border-top bg-white d-flex justify-content-between align-items-center">
            <span class="small text-muted text-truncate" style="max-width: 300px;">
                <span x-show="selectedItem">Selected: <b x-text="selectedItem?.original_name"></b></span>
            </span>
            <div>
                <button @click="closeModal()" class="btn btn-outline-secondary mr-2">Cancel</button>
                <button @click="insertMedia()" :disabled="!selectedItem" class="btn btn-primary">
                    Insert Media
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .media-modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .media-modal-content {
        width: 90%;
        height: 85vh;
        max-width: 1200px;
    }

    .border-bottom-active.border-primary {
        border-bottom: 2px solid #007bff !important;
    }

    .border-bottom-active.border-transparent {
        border-bottom: 2px solid transparent !important;
    }

    .upload-zone {
        border: 2px dashed #ccc;
        transition: all 0.2s;
    }

    .bg-light-blue {
        background-color: #e3f2fd !important;
    }

    .ratio-box {
        position: relative;
        width: 100%;
        padding-top: 100%;
        /* 1:1 Aspect Ratio */
    }

    .ratio-box>* {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }

    .media-item {
        cursor: pointer;
        border-width: 2px !important;
    }

    .media-item:hover {
        border-color: #a6c4f7 !important;
    }

    .checkmark-badge {
        top: 5px;
        right: 5px;
        width: 20px;
        height: 20px;
        font-size: 10px;
    }

    .text-xs {
        font-size: 0.75rem;
    }
</style>

<script>
    function mediaLibrary() {
        return {
            isOpen: false,
            activeTab: 'upload',
            mediaItems: [],
            selectedItem: null,
            isLoading: false,
            isUploading: false,
            uploadProgress: 0,
            pagination: { current_page: 0, last_page: 1 },
            dragover: false,
            callback: null,

            init() { },

            openModal(params = {}) {
                this.isOpen = true;
                this.callback = params.onSelect || null;
                this.selectedItem = null;
                this.activeTab = 'upload';
                if (this.mediaItems.length === 0) {
                    this.loadMedia(1);
                }
            },

            closeModal() {
                this.isOpen = false;
                this.callback = null;
            },

            switchTab(tab) {
                this.activeTab = tab;
                if (tab === 'library' && this.mediaItems.length === 0) {
                    this.loadMedia(1);
                }
            },

            async loadMedia(page = 1) {
                if (this.isLoading) return;
                this.isLoading = true;

                try {
                    let response = await fetch(`{{ route('admin.media.list') }}?page=${page}`);
                    let data = await response.json();

                    if (page === 1) {
                        this.mediaItems = data.data;
                    } else {
                        this.mediaItems = [...this.mediaItems, ...data.data];
                    }
                    this.pagination = { current_page: data.current_page, last_page: data.last_page };
                } catch (error) {
                    console.error('Error loading media:', error);
                } finally {
                    this.isLoading = false;
                }
            },

            handleScroll(e) {
                const bottom = e.target.scrollHeight - e.target.scrollTop <= e.target.clientHeight + 50;
                if (bottom && this.pagination.current_page < this.pagination.last_page) {
                    this.loadMedia(this.pagination.current_page + 1);
                }
            },

            handleDrop(e) {
                this.dragover = false;
                if (e.dataTransfer.files.length > 0) {
                    this.handleUpload(e.dataTransfer.files);
                }
            },

            handleFiles(files) {
                if (files.length > 0) {
                    this.handleUpload(files);
                }
            },

            async handleUpload(files) {
                this.isUploading = true;
                this.uploadProgress = 0;

                const formData = new FormData();
                formData.append('file', files[0]);

                try {
                    const response = await axios.post('{{ route('admin.media.upload') }}', formData, {
                        headers: { 'Content-Type': 'multipart/form-data' },
                        onUploadProgress: (progressEvent) => {
                            const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                            this.uploadProgress = percentCompleted;
                        }
                    });

                    if (response.data.success) {
                        this.switchTab('library');
                        this.mediaItems.unshift(response.data.media);
                        this.selectedItem = response.data.media;
                        this.isUploading = false;
                    }
                } catch (error) {
                    alert('Upload failed: ' + (error.response?.data?.message || error.message));
                    this.isUploading = false;
                }
            },

            selectItem(item) {
                this.selectedItem = item;
            },

            async deleteItem() {
                if (!this.selectedItem || !confirm('Are you sure? This cannot be undone.')) return;

                try {
                    await axios.delete(`/admin/media/${this.selectedItem.id}`);
                    this.mediaItems = this.mediaItems.filter(i => i.id !== this.selectedItem.id);
                    this.selectedItem = null;
                } catch (error) {
                    alert('Delete failed');
                }
            },

            insertMedia() {
                if (this.callback && this.selectedItem) {
                    this.callback(this.selectedItem);
                    this.closeModal();
                }
            },

            formatBytes(bytes, decimals = 2) {
                if (!+bytes) return '0 Bytes';
                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`;
            }
        }
    }
</script>