<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('skillDisplay', () => ({
            currentSkill: {
                'percent': 0,
            }
        }));
    });
</script>