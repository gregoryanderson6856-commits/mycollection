test('see collection', function () {
    $page = visit('/');
 
    $page->assertSee('Collection');
});