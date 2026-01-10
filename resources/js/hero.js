export default () => ({
    showName: true,
    init() {
        setInterval(() => {
            this.showName = !this.showName;
        }, 4000);
    }
})
