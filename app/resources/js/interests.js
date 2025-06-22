window.tagInputComponent = function (tags, route, csrf) {
    return {
        input: '',
        tags: tags,
        addTag() {
            let tag = this.input.trim();
            if (tag && !this.tags.includes(tag)) {
                this.tags.push(tag);
                this.sortTags();
                this.syncInterests();
            }
            this.input = '';
        },
        removeTag(index) {
            this.tags.splice(index, 1);
            this.syncInterests();
        },
        sortTags() {
            this.tags.sort((a, b) => a.localeCompare(b));
        },
        syncInterests() {
            fetch(route, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf
                },
                body: JSON.stringify({ interests: this.tags })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Interests synced:', data);
                })
                .catch(error => {
                    console.error('Error syncing interests:', error);
                });
        }
    };
};
